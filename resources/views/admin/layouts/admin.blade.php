
@section('body_class','nav-md')

@section('page')
    <div class="container body">
        <div class="main_container">
            @section('header')
                @include('admin.sections.navigation')
                @include('admin.sections.header')
            @show

            @yield('left-sidebar')

            <div class="right_col" role="main">
                <div class="page-title">
                    <div class="title_left">
                        <h1 class="h3">@yield('title')</h1>
                    </div>
                   
                        <div class="title_right">
                            <div class="pull-right">
                               
                            </div>
                        </div>
                    
                </div>
                @yield('content')
            </div>

            <footer>
                @include('admin.sections.footer')
            </footer>
        </div>
    </div>
@stop

@section('styles')
    {{-- {{ Html::style('/css/admin.css') }} --}}
    <link rel="stylesheet" href="/css/admin.css">
@endsection

@section('scripts')
   {{--  {{ Html::script('js/admin.js') }} --}}
@endsection