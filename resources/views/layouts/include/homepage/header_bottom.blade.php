<video playsinline autoplay muted loop style="max-width:100%">
  <source src="{{asset('images/background/video_background.mp4')}}" type="video/mp4">
</video>
<div style="position:absolute;top:0;width:750px;padding: 10px;">
  <h2>@lang('pages.homepage.vacancyInPln')</h2>
  <p>@lang('pages.homepage.findPlace')</p>
  <form action="#" method='GET'>
    <div class="banerSearch">
      <div class="fild-wrap fw-job-title">
        <i class="fas fa-briefcase">&nbsp;</i>
        <input type="text" name='keyword' style="background-color:transparent;margin-left:40px;border:none" />
      </div>
      <div class="fild-wrap fw-submit">
        <button type='submit' class='btn btn-primary'>@lang('app.searchJob')</button>
      </div>
    </div>
  </form>
</div>
