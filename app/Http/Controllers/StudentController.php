<?php
namespace App\Http\Controllers;

use App\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function test1(){
//        $students = DB::select('select * from student');
//        var_dump($students);

        //新增
//        $bool = DB::insert('insert into student(name,age) values(?,?)',
//            ['imooc',19]);
//        var_dump($bool);
        //更新
//        $num = DB::update('update student set age = ? where name = ? ',
//            [20,'sean']);
//        var_dump($num);
        //查询
//        $students = DB::select('select * from student where id > ?',
//            [1002]);
//        dd($students);

        //删除
        $num = DB::delete('delete from student where id > ?',[1002]);
        var_dump($num);
    }
    //使用查询构造器添加数据
    public function query1()
    {
//        $bool = DB::table('student')->insert(
//            ['name'=>'imooc','age'=>18]
//        );
//        var_dump($bool);

//        $id = DB::table('student')->insertGetId(
//            ['name'=>'sean','age'=>18]
//        );
//        var_dump($id);

        $bool = DB::table('student')->insert([
            ['name'=>'name1','age'=> 20],
            ['name'=>'name2','age'=> 21]
        ]);
        var_dump($bool);
    }

    //使用查询构造器更新数据
    public function query2()
    {
//        $num = DB::table('student')
//            ->where('id',1004)
//            ->update(['age'=>30]);
//        var_dump($num);

//        $num = DB::table('student')->increment('age');
//        $num = DB::table('student')->increment('age',3);

//        $num = DB::table('student')->decrement('age');
//        $num = DB::table('student')->decrement('age',3);

//        $num = DB::table('student')
//            ->where('id',1003)
//            ->decrement('age',3);

        $num = DB::table('student')
            ->where('id',1003)
            ->decrement('age',3,['name'=>'iimooc']);
        var_dump($num);
    }

    //使用查询构造器删除数据
    public function query3()
    {
//        $num = DB::table('student')
//            ->where('id',1008)
//            ->delete();

//        $num = DB::table('student')
//            ->where('id','>=',1006)
//            ->delete();
//        var_dump($num);

        DB::table('student')->truncate();
    }

    public function query4()
    {
//        $bool = DB::table('student')->insert([
//            ['id'=>1001,'name'=>'name1','age'=>18],
//            ['id'=>1002,'name'=>'name2','age'=>18],
//            ['id'=>1003,'name'=>'name3','age'=>19],
//            ['id'=>1004,'name'=>'name4','age'=>20],
//            ['id'=>1005,'name'=>'name5','age'=>21],
//        ]);
//        var_dump($bool);

        //get()
//        $students = DB::table('student')->get();

        //first()
//        $student = Db::table('student')
//            ->orderBy('id','desc')
//            ->first();
//        dd($student);

        //where
//        $students = DB::table('student')
//            ->where('id','>=',1002)
//            ->get();

//        $students = DB::table('student')
//            ->whereRaw('id >= ? and age > ?',[1001,18])
//            ->get();

        //pluck
//        $names = DB::table('student')
//            ->pluck('name');

        //lists
//        $names = DB::table('student')
//            ->lists('name','id');

        //select
//        $students = DB::table('student')
//            ->select('id','name','age')
//            ->get();

        //chunk
//        echo '<pre>';
//        DB::table('student')->chunk(2,function ($students){
//            var_dump($students);
//
//            if(你的条件)
//            {
//                return false;
//            }
//        });

        //dd($students);
    }

    //聚合函数
    public function query5()
    {
//        $num  = DB::table('student')->count();

//        $max = DB::table('student')->max('age');
//        $min = DB::table('student')->min('age');

//        $min = DB::table('student')->avg('age');

        $sum = DB::table('student')->sum('age');
        var_dump($sum);
    }

    public function orm1()
    {
        //all()
//        $students = Student::all();

        //find()
//        $student = Student::find(1001);

        //findOrFail()
//        $student = Student::findOrFail(1006);

        //var_dump($student);

//        $students = Student::get();
//        $student = Student::where('id','>',1001)
//            ->orderBy('age','desc')
//            ->first();
//        dd($student);

//        echo '<pre>';
//        Student::chunk(2,function($students){
//            var_dump($students);
//        });

        //聚合函数
//        $num = Student::count();
        $max = Student::where('id','>',1001)->max('age');
        var_dump($max);
    }

    public function orm2()
    {
        //使用模型新增数据
//        $student = new Student();
//        $student->name = 'sean2';
//        $student->age = 20;
//        $bool = $student->save();
//        dd($bool);

//        $student = Student::find(1008);
//        echo date('Y-m-d H:i:s',$student->created_at);

        //使用模型的Create方法新增数据
//        $student = Student::create(
//            ['name'=>'imooc','age'=>18]
//        );
//        dd($student);

        //firstOrCreate()
//        $student = Student::firstOrCreate(
//            ['name'=>'imooc']
//        );

        //firstOrNew(): 以属性进行查找，没有则创建，保存需要自己调用save()
        $student = Student::firstOrNew(
            ['name'=>'imoocss']
        );
        $bool = $student->save();
        dd($bool);
    }

    public function orm3()
    {
        // 通过模型更新数据
//        $student = Student::find(1010);
//        $student->name = 'kitty';
//        $bool = $student->save();
//        var_dump($bool);

        $num = Student::where('id','>=',1009)->update(
            ['age'=>41]
        );
        var_dump($num);
    }

    public function orm4()
    {
        // 通过模型删除
//        $student = Student::find(1010);
//        $bool = $student->delete();
//        var_dump($bool);

        //通过主键删除
//        $num = Student::destroy(1009);
//        $num = Student::destroy(1008,1007);
//        $num = Student::destroy([1006,1005]);
//        var_dump($num);

        $num = Student::where('id','>',1003)->delete();
        var_dump($num);
    }

    public function section1()
    {
//        $students = Student::get();
        $students = [];

        $name = 'sean';
        $arr = ['sean','imooc'];

        return view('student.section1',[
            'name'=>$name,
            'arr'=>$arr,
            'students'=>$students
        ]);
    }

    public function urlTest()
    {


        return 'urlTest';
    }

}


