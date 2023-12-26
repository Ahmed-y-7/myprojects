@extends('layouts.app')

@section('title', 'تعديل المشروع')

@section('content')
<div class="row justify-content-center text-right">
    <div class="col-8">
        <div class="card p-5">
        <h3 class="text-center pb-5 font-weight-bold">
            تعديل المشروع
        </h3>
        <form action="/projects/{{$project->id}}" method="POST" dir="rtl">
            @method('PATCH')
            @include('projects.form')    <!-- هنا ربطه مع ملف فورم لان ملف فورم راح نستخدمه في انشاء المشروع وتعديل المشروع-->
            <div class="form-group d-flex flex-row-reverse">
                <button type="submit" class="btn btn-primary"> حفظ </button>
                <a href="/projects" class="btn btn-light">الغاء</a>
            </div> 
        </form>
    </div>
    </div>
</div>
@endsection