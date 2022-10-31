<div class="section tienich">
        <section class="slideshow">
      <ul class="navigation">
        @foreach($val->section as $key => $vals)
        <li class="navigation-item {{$key==0 ? 'active' : ''}}">
          <span class="rotate-holder"></span>
          <span class="background-holder" style="background-image: url(data/ladipage/{{$vals->img}});"></span>
        </li>
        @endforeach
      </ul>
      
      <div class="detail">
        @foreach($val->section as $key => $vals)
        <div class="detail-item {{$key==0 ? 'active' : ''}}">
          <div class="background" style="background-image: url(data/ladipage/{{$vals->img}}); height: 100vh;"><div class="info">
            <h3>{{$vals->name}}</h3>
            <p>{{$vals->content}}</p>
        </div></div>
        </div>
        @endforeach
      </div>
    </section>
    </div>