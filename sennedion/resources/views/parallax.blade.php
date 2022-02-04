<x-app-layout>
    <x-slot name="header">
        Anasayfa
    </x-slot>
<section class="page-item">
    <img src="{{asset('uploads')}}/bg.png" id="bg" alt="resim">
    <img src="{{asset('uploads')}}/bulut2.png" id="bulut" alt="resim">
    <img src="{{asset('uploads')}}/balonlar2.png" id="balonlar" alt="resim">
    <a href="" id="btn">Keşfet</a>
    <img src="{{asset('uploads')}}/mountains_front3.png" id="mountains_front" alt="resim">
</section>

<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap');
    *
    {
        margin : 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins',sans-serif;
        scroll-behavior: smooth;
    }
    body
    {
        min-height: 100vh;
        overflow-x: hidden;
        background: linear-gradient(#fff,#616161);
    }

    section{
        position: relative;
        width: 100%;
        height: 100vh;
        padding: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }
    section::before
    {
        content: '';
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 80px;
        background: linear-gradient(to top,#99999e,transparent);
        z-index: 1000;

    }
    section img
    {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        pointer-events: none;
    }
    section img#bg
    {
        mix-blend-mode: screen;
        overflow: hidden;
    }
    section img#mountains_front
    {
        z-index: 9;
    }
    #btn
    {
        text-decoration: none;
        display: inline-block;
        padding: 8px 30px;
        border-radius: 40px;
        background: #fff;
        color: #2b1055;
        font-size: 1.5em;
        z-index: 9;
        transform: translateY(100px);
    }

</style>

<div style="font-size: 40px">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque iure, nihil. Ab amet autem culpa eaque esse eum, excepturi fuga in iure minus optio, placeat quia sit tenetur unde veniam! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur cumque enim eveniet explicabo, laboriosam magnam maiores modi molestias nisi obcaecati odit quaerat qui reprehenderit rerum tenetur. Asperiores deleniti minus quae.
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cum dolore ducimus excepturi hic, id illum ipsum itaque laborum nihil, nobis non omnis quam quis ratione, sed sit sunt veniam.
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur atque corporis deleniti ducimus earum est explicabo fuga incidunt iure labore libero magnam nemo nobis odio possimus, quia quos sint, tempora.
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur assumenda deleniti eius expedita id illo laudantium molestiae nemo nihil, nobis non perspiciatis quaerat, quisquam ratione repellendus sequi, sit tenetur velit!

</div>

<script>
    let bg = document.getElementById('bg');
    let bulut = document.getElementById('bulut');
    let balonlar = document.getElementById('balonlar');
    let btn = document.getElementById('btn');
    let mountains_front = document.getElementById('mountains_front');

    window.addEventListener('scroll',function(){
        let value = window.scrollY;
        bg.style.top = value * 0.8 + 'px';
        bulut.style.left = value * 0.5 + 'px';
        balonlar.style.top = value * 1.5 + 'px';
        mountains_front.style.left = value * 0 + 'px';
        btn.style.marginTop = value * 0.5 + 'px';
    })
</script>
</x-app-layout>
