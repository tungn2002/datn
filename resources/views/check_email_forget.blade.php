<div style="width:600px; margin: 0 auto">
    <div style="text-align: center">
        <h2>Xin chào {{$user->name}}</h2>
        <p> click vào link để đặt lại mật khẩu.</p>
        <p> 
            <a href="{{route('user.getPass',['user'=>$user->id_user,'token'=>$user->token])}}"
            style="display:inline-block; background: green; color:#fff; padding: 7px 25px; font-weight:bold">kich hoat tai khoan</a>
                
        </p>
    </div>
</div>