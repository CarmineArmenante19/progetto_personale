@if (Route::currentRouteName()=='homepage')
<div class="container-fluid welcome-header">
    <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1 class="display-1 text-g text-center">{{$title}}</h1>
            </div>
            <div class="col-12 col-md-6 animation-welcome d-flex justify-content-center align-items-center">
                <div class="div_custom"></div>
            </div>
        </div>
    </div>
@elseif(Route::currentRouteName()=='register')
<div class="container-fluid register-header">
    <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="box-register">
                    <h1 class="display-1 text-g text-center">{{$title}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif(Route::currentRouteName()=='login')
<div class="container-fluid login-header">
    <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="box-register">
                    <h1 class="display-1 text-g text-center">{{$title}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif(Route::currentRouteName()=='article.index')
<div class="container-fluid index-container">
    <div class="row">
        <div class="col-12">
            <h1 class="display-1 text-g">{{$title}}</h1>
        </div>
    </div>
</div>
@elseif(Route::currentRouteName()=='article.create')
<div class="container-fluid create-container">
    <div class="row">
        <div class="col-12">
            <h1 class="display-1 text-g">{{$title}}</h1>
        </div>
    </div>
</div>
@endif    
