<!----------------------
   Our profile cards
------------------------>

<div class="cards-container">
    <div class="flex justify-center">
        <div class="edit card w-1/2 h-full" style="margin:0">
            <div class="wrapper">
                <form class="login" {{ url('/hocsinh/update') }}>
                    <p class="title" style="color:#6573d0">Change profile</p>
                    <input placeholder="Username" type="email" name="email" autofocus />
                    <i class="fa fa-user"></i>
                    <input type="password" placeholder="Password" name="password" />
                    <i class="fa fa-key"></i>
                    <a href="#">Forgot your password?</a>
                    
                    {{-- @if ($updateMode) --}}
                        <button type="submit">
                            <i class="spinner"></i>
                            <span class="state">Change</span>
                        </button>
                    {{-- @endif --}}
                </form>
            </div>
        </div>
        @foreach ($profile as $pro)
            <div class="card card-one">
                <header>
                    <div class="avatar">
                        <img src="https://randomuser.me/api/portraits/men/3.jpg" alt="Jhon Doe" />
                    </div>
                </header>

                <h3 class="uppercase font-medium">{{ $pro->name }}</h3>
                <div class="desc">
                    Chức Vụ: {{ $pro->role }}
                </div>
                <div class="desc">
                    @if ($pro->status == 0)
                        Trạng thái: Active
                    @else
                        Trạng thái: Off
                    @endif
                </div>
                <div class="contacts">
                    <a href=""><i class="fa fa-plus"></i></a>
                    <a href=""><i class="fa fa-whatsapp"></i></a>
                    <a href=""><i class="fa fa-envelope"></i></a>
                    <div class="clear"></div>
                </div>

                <footer>
                    <input
                        class="mx-auto block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" type="file">
                </footer>
            </div>
        @endforeach
    </div>
</div>












<style>
    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    body {
        font-family: 'Dosis', sans-serif;
        background: #c5cae9;
        text-align: center;
    }

    .clear {
        clear: both;
    }

    .cards-container {
        /* width: 793px; */
        /* max-width: 100%; */
        margin: 2rem auto;
    }

    .card {
        /* float: left; */
        margin: 0 3rem 3rem 3rem;
    }

    .card-one {
        position: relative;
        max-width: 400px;
        background: #fff;
        box-shadow: 0 10px 7px -5px rgba(0, 0, 0, .4);
    }

    .card-one header {
        position: relative;
        width: 100%;
        height: 60px;
        background-color: #6573d0;
    }

    .card-one header::before,
    .card-one header::after {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: inherit;
    }

    .card-one header::before {
        -webkit-transform: skewY(-8deg);
        -moz-transform: skewY(-8deg);
        -ms-transform: skewY(-8deg);
        -o-transform: skewY(-8deg);
        transform: skewY(-8deg);
        -webkit-transform-origin: 100% 100%;
        -moz-transform-origin: 100% 100%;
        -ms-transform-origin: 100% 100%;
        -o-transform-origin: 100% 100%;
        transform-origin: 100% 100%;
    }

    .card-one header::after {
        -webkit-transform: skewY(8deg);
        -moz-transform: skewY(8deg);
        -ms-transform: skewY(8deg);
        -o-transform: skewY(8deg);
        transform: skewY(8deg);
        -webkit-transform-origin: 0 100%;
        -moz-transform-origin: 0 100%;
        -ms-transform-origin: 0 100%;
        -o-transform-origin: 0 100%;
        transform-origin: 0 100%;
    }

    .card-one header .avatar {
        position: absolute;
        left: 50%;
        top: 30px;
        margin-left: -50px;
        z-index: 5;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        background: #ccc;
        border: 3px solid #fff;
    }

    .card-one header .avatar img {
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        width: 100px;
        height: auto;
    }

    .card-one h3 {
        position: relative;
        margin: 80px 0 30px;
        text-align: center;
    }

    .card-one h3::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        margin-left: -15px;
        width: 30px;
        height: 1px;
        background: #000;
    }

    .card-one .desc {
        padding: 0 1rem 2rem;
        text-align: center;
        line-height: 1.5;
        color: #777;
    }

    .card-one .contacts {
        width: 200px;
        max-width: 100%;
        margin: 0 auto 3rem;
    }

    .card-one .contacts a {
        display: block;
        width: 33.333333%;
        float: left;
        text-align: center;
        color: #c8c;
    }

    .card-one .contacts a:hover {
        color: #333;
    }

    .card-one .contacts a:hover .fa::before {
        color: #fff;
    }

    .card-one .contacts a:hover .fa::after {
        width: 100%;
        height: 100%;
    }

    .card-one .contacts a .fa {
        position: relative;
        width: 40px;
        height: 40px;
        line-height: 39px;
        overflow: hidden;
        text-align: center;
        font-size: 1.3em;
    }

    .card-one .contacts a .fa:before {
        position: relative;
        z-index: 1;
    }

    .card-one .contacts a .fa::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        background: #c8c;
        -webkit-transition: width 0.3s, height 0.3s;
        -moz-transition: width 0.3s, height 0.3s;
        -ms-transition: width 0.3s, height 0.3s;
        -o-transition: width 0.3s, height 0.3s;
        transition: width 0.3s, height 0.3s;
    }

    .card-one .contacts a:last-of-type .fa {
        line-height: 36px;
    }

    .card-one footer {
        position: relative;
        padding: 2rem;
        background-color: #6573d0;
        text-align: center;
    }

    .card-one footer a {
        padding: 0 1rem;
        color: #e2e2e2;
        -webkit-transition: color 0.4s;
        -moz-transition: color 0.4s;
        -ms-transition: color 0.4s;
        -o-transition: color 0.4s;
        transition: color 0.4s;
    }

    .card-one footer a:hover {
        color: #c8c;
    }

    .card-one footer::before {
        content: '';
        position: absolute;
        top: -27px;
        left: 50%;
        margin-left: -15px;
        border: 15px solid transparent;
        border-bottom-color: #6573d0;
    }

    @media only screen and (max-width: 810px) {
        .card {
            float: none;
            margin-left: auto;
            margin-right: auto;
        }
    }

</style>

<style>
    @keyframes spinner {
        0% {
            transform: rotateZ(0deg);
        }

        100% {
            transform: rotateZ(359deg);
        }
    }

    * {
        box-sizing: border-box;
    }

    .wrapper {
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        width: 100%;
        min-height: 100%;
        padding: 20px;
    }

    .login {
        border-radius: 2px 2px 5px 5px;
        padding: 10px 20px 20px 20px;
        background: #fff;
        position: relative;
        padding-bottom: 80px;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.3);
        width: 100%;
        height: 100%;
    }

    .login.loading button {
        max-height: 100%;
        padding-top: 50px;
    }

    .login.loading button .spinner {
        opacity: 1;
        top: 40%;
    }

    .login.ok button {
        background-color: #8bc34a;
    }

    .login.ok button .spinner {
        border-radius: 0;
        border-top-color: transparent;
        border-right-color: transparent;
        height: 20px;
        animation: none;
        transform: rotateZ(-45deg);
    }

    .login input {
        display: block;
        padding: 15px 10px;
        margin-bottom: 10px;
        width: 100%;
        border: 1px solid #ddd;
        transition: border-width 0.2s ease;
        border-radius: 2px;
        color: #ccc;
    }

    .login input+i.fa {
        color: #fff;
        font-size: 1em;
        position: absolute;
        margin-top: -47px;
        opacity: 0;
        left: 0;
        transition: all 0.1s ease-in;
    }

    .login input:focus {
        outline: none;
        color: #444;
        border-color: #6573d0;
        border-left-width: 35px;
    }

    .login input:focus+i.fa {
        opacity: 1;
        left: 30px;
        transition: all 0.25s ease-out;
    }

    .login a {
        font-size: 0.8em;
        color: #6573d0;
        text-decoration: none;
    }

    .login .title {
        color: #444;
        font-size: 1.2em;
        font-weight: bold;
        margin: 10px 0 30px 0;
        border-bottom: 1px solid #eee;
        padding-bottom: 20px;
    }

    .login button {
        width: 100%;
        height: 100%;
        padding: 10px 10px;
        background: #6573d0;
        color: #fff;
        display: block;
        border: none;
        margin-top: 20px;
        position: absolute;
        left: 0;
        bottom: 0;
        max-height: 60px;
        border: 0px solid rgba(0, 0, 0, 0.1);
        border-radius: 0 0 2px 2px;
        transform: rotateZ(0deg);
        transition: all 0.1s ease-out;
        border-bottom-width: 7px;
    }

    .login button .spinner {
        display: block;
        width: 40px;
        height: 40px;
        position: absolute;
        border: 4px solid #fff;
        border-top-color: rgba(255, 255, 255, 0.3);
        border-radius: 100%;
        left: 50%;
        top: 0;
        opacity: 0;
        margin-left: -20px;
        margin-top: -20px;
        animation: spinner 0.6s infinite linear;
        transition: top 0.3s 0.3s ease, opacity 0.3s 0.3s ease, border-radius 0.3s ease;
        box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.2);
    }

    .login:not(.loading) button:hover {
        box-shadow: 0px 1px 3px #2196f3;
    }

    .login:not(.loading) button:focus {
        border-bottom-width: 4px;
    }

    footer {
        display: block;
        padding-top: 50px;
        text-align: center;
        color: #ddd;
        font-weight: normal;
        text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.2);
        font-size: 0.8em;
    }

    footer a,
    footer a:link {
        color: #fff;
        text-decoration: none;
    }

</style>
