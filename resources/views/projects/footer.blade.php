<div class="card-footer" dir="rtl">
    <div class="d-flex">
        <div class="d-flex align-items-center">
            <img src="/images/clock.svg" alt="">
            <div class="mr-2">
                {{ $project->created_at->diffForHumans() }} <!--    carbon عشان يستعدي اوقات انشاء المشروع من حزمة diffForHumansاستخدم خاصية -->
            </div>
        </div>

        <div class="d-flex align-items-center mr-4">
            <img src="/images/list-check.svg" alt="">
            <div class="mr-2">
                {{ count($project->tasks)}}

            </div>
        </div>

        <div class="d-flex align-items-center mr-auto">
            <form action="/projects/{{$project->id}}" method="POST">
                @method('DELETE')
                @csrf
                <input type="submit" class="btn btn-delete mt-2" value="">
            </form>
        </div>
    </div>
</div>