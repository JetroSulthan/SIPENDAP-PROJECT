
@extends('layout.main')

@section('container')
<div class="container">
    <div class="container_kiri">
        <h1>Subsisi <span class="text-white">Pupuk</span> Kini <br> <span><span class=" text-white">Lebih</span> Mudah  </span></h1>
        <p>Membantu lebih dari 1000+ petani mendapat bantuan <br>pupuk langsung dari pemerintah! </p>
    </div>
+
    <div class="container_kanan">
        <img src="img/rumah.png" alt="" width="620px"></img>
    </div>
</div>
<style>
body{
    background-image:linear-gradient( #72B944, #FFFFFF);
}

.login{
    background-color:none ;
    /* justify-items: center; */
    /* justify-content: center; */
    /* align-items: center; */
    /* align-content: center; */
    display: flex;
    margin-top: 200px;
}

.login a{
    text-decoration: underline;
    color: blue;
}

.box_regist{
    display: flex;
    margin-top:150px;
    margin-x:50px;
    background-color: 
}

.container{
    display: flex;
    /* margin-top: 50px;  */

}

.container_kiri h1{
    margin-left: 80px;
    margin-top: 80px; 
    font-size: 70px;
    font-family: Red Hat display;
    font-weight: 900;
}

.container_kiri p{
    font-family: Red Hat display;
    font-size: 27px;
    margin-left: 80px;
}

.container_kanan {
    margin-left: 240px;
}

.box{
    display: flex;
    background-color: FFFFFF;
}

</style>
@endsection
