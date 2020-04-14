@include ('head')
<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
</ul>
<div>
  <div id="panel">
    <h1>Todo List</h1>
    <div id="todolist">
      <ul>
        <li class="new">
          <div class="checkbox"></div>
          <div class="content" contenteditable="true"></div>
        </li>
      </ul>
    </div>
  </div>
</div>

<script id="todolist_template" type="text/x-handlebars-template">
  <li data-id=@{{id}} class="@{{#if is_complete}} complete @{{/if}}">
    <div class="checkbox"></div>
    <div class="content">@{{content}}</div>
    <div class="actions">
      <div class="delete">X</div>
    </div>
  </li>
</script>

<script>
    var todos = @json($todos);
</script>

@include ('footer')
