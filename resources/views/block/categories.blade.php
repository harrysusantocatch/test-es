
<h2>{{ trans('front.categories') }}</h2>
<div class="panel-group category-products" id="accordian">
  @foreach ($categories as $category)
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordian" href="#{{ $category->id }}">
            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
          </a>
          <a href="">  {{ $category->name }}</a>
        </h4>
      </div>
      <div id="{{ $category->id }}" class="panel-collapse collapse">
        <div class="panel-body">
          <ul>
            @foreach ($category->childs as $cateChild)
                <li>
                    <a data-toggle="collapse" href="#{{ $cateChild->id }}">
                      <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                    </a>
                    - <a href="">{{ $cateChild->name }}</a>
                    <div id="{{ $cateChild->id }}" class="collapse">
                        <ul>
                            @foreach ($cateChild->childs as $cateChild2)
                                <li>
                                    -- <a href="">{{ $cateChild2->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  @endforeach
</div>

