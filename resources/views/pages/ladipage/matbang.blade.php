<div class="section phankhu">
    <h2>{{$val->name}}</h2>
    <img src="data/ladipage/{{$val->img}}">
    <div class="">
        <div class="menu-matbang">
            <ul>
                @foreach($val->section as $sec)
                <li><a data-toggle="modal" data-target="#matbang" href="#"> <img src="data/ladipage/{{$sec->img}}"> {{$sec->name}} </a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="matbang" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <p>Located at the gateway of Hanoi - Hai Phong highway, in the territory of 2 communes Nghia Tru and Long Hung, Van Giang district, Hung Yen province. Vinhomes Ocean Park 2 - The Empire urban area is parallel to the arterial road connecting "Economic triangle: Hanoi - Hai Phong - Ha Long".</p>
                <p>In addition, the project also fully owns the key traffic connections of Gia Lam from everywhere to Vinhomes Ocean Park - The Empire including Co Linh Interchange (400 billion): Completed in January 2021 and broaden with 4 lanes, expected to be completed in 2023.</p>
            </div>
          </div>
        </div>
    </div>
</div>