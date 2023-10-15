<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Oex_exam_master;
use App\Models\Oex_question_master;
use App\Models\Oex_result;
use App\Models\User;
use App\Models\user_exam;

class StudentController extends Controller
{
    //student dashboard
    public function dashboard()
    {
        $data['portal_exams']=Oex_exam_master::select(['tbl_exam_masters.*','tbl_categories.name as cat_name'])
        ->join('tbl_categories','tbl_exam_masters.category','=','tbl_categories.id')
        ->orderBy('id','desc')->where('tbl_exam_masters.status','1')->get()->toArray();
        return view('student.dashboard',$data);
    }

    //Exam page
    public function exam()
    {
        $userId = Session::get('id');
        $student_info = user_exam::select(['tbl_user_exams.*','users.name','tbl_exam_masters.title','tbl_exam_masters.exam_date'])
        ->join('users','users.id','=','tbl_user_exams.user_id')
        ->join('tbl_exam_masters','tbl_user_exams.exam_id','=','tbl_exam_masters.id')->orderBy('tbl_user_exams.exam_id','desc')
        ->where('tbl_user_exams.user_id',$userId)
        ->where('tbl_user_exams.std_status','1')
        ->get()->toArray();

        return view('student.exam', compact('student_info'));
    }

    //join exam page
    public function join_exam($id)
    {    
        $question= Oex_question_master::where('exam_id',$id)->get();
        $exam=Oex_exam_master::where('id',$id)->get()->first();
        return view('student.join_exam',['question'=>$question,'exam'=>$exam]);
    }

    //On submit
    public function submit_questions(Request $request)
    {    
        $yes_ans=0;
        $no_ans=0;
        $data= $request->all();
        $result=array();
        for($i=1;$i<=$request->index;$i++){

            if(isset($data['question'.$i])){
                $q=Oex_question_master::where('id',$data['question'.$i])->get()->first();

                if($q->ans==$data['ans'.$i]){
                    $result[$data['question'.$i]]='YES';
                    $yes_ans++;
                }else{
                    $result[$data['question'.$i]]='NO';
                    $no_ans++;
                }
            }
        }
    
       $std_info = user_exam::where('user_id',Session::get('id'))->where('exam_id',$request->exam_id)->get()->first();
       $std_info->exam_joined=1;
       $std_info->update();

       $res = new Oex_result();
       $res->exam_id=$request->exam_id;
       $res->user_id = Session::get('id');
       $res->yes_ans=$yes_ans;
       $res->no_ans=$no_ans;
       $res->result_json=json_encode($result);
       $res->save();
       
       return redirect(url('student/exam'));
    }

    //Applying for exam
    public function apply_exam($id)
    {
        $checkuser = user_exam::where('user_id',Session::get('id'))->where('exam_id',$id)->get()->first();

        if($checkuser){
            $arr = array('status'=>'false','message'=>'Already applied, see your exam section');        
        }
        else
        {
            $exam_user = new user_exam();
            $exam_user->user_id= Session::get('id');
            $exam_user->exam_id=$id;
            $exam_user->std_status=1;
            $exam_user->exam_joined=0;
            $exam_user->save();

            $arr = array('status'=>'true','message'=>'applied successfully','reload'=>url('student/dashboard'));
        }
        echo json_encode($arr);
    }

    //View Result
    public function view_result($id)
    {     
        $userId = Session::get('id');
        $data['result_info'] = Oex_result::where('exam_id',$id)->where('user_id',$userId)->get()->first();    
        $data['student_info'] = User::where('id',$userId)->get()->first();
        $data['exam_info']=Oex_exam_master::where('id',$id)->get()->first();
        $data['averageResultForUser'] = Oex_result::where('user_id', $userId)->avg('yes_ans');

        $averageYesAnsForUser = Oex_result::where('exam_id',$data['exam_info']['id'])->where('user_id', $userId)->avg('yes_ans');
        $averageNoAnsForUser = Oex_result::where('exam_id',$data['exam_info']['id'])->where('user_id', $userId)->avg('no_ans');

        $data['averageYesAnsForUser'] = $averageYesAnsForUser;
        $data['averageNoAnsForUser'] = $averageNoAnsForUser;
        $data['combinedAverageForUser'] = round($averageYesAnsForUser / $averageNoAnsForUser, 2);
        
        return view('student.view_result',$data);
    }

    //View answer
    public function view_answer($id)
    {    
        $data['question']= Oex_question_master::where('exam_id',$id)->get()->toArray();
        return view('student.view_amswer',$data);
    }

}
