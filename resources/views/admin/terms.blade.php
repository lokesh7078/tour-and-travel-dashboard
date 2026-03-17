<x-master-layout>

<div style="text-align:center">

    <h2>Terms & Conditions</h2>

    <!-- IMAGE 1 -->
    <img 
        src="{{ asset('images/terms1.jpeg') }}" 
        style="width:100%; max-width:1000px; margin-bottom:30px; cursor:zoom-in;"
        onclick="openImage(this.src)"
    >

    <!-- IMAGE 2 -->
    <img 
        src="{{ asset('images/terms2.jpeg') }}" 
        style="width:100%; max-width:1000px; margin-bottom:30px; cursor:zoom-in;"
        onclick="openImage(this.src)"
    >

    <!-- IMAGE 3 -->
    <img 
        src="{{ asset('images/terms3.jpeg') }}" 
        style="width:100%; max-width:1000px; margin-bottom:30px; cursor:zoom-in;"
        onclick="openImage(this.src)"
    >

    <!-- IMAGE 4 -->
    <img 
        src="{{ asset('images/terms4.jpeg') }}" 
        style="width:100%; max-width:1000px; margin-bottom:30px; cursor:zoom-in;"
        onclick="openImage(this.src)"
    >

</div>


<!-- FULLSCREEN MODAL -->
<div id="imageModal" style="
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.9);
    text-align:center;
    z-index:999;
">

    <span onclick="closeImage()" 
        style="
        position:absolute;
        top:20px;
        right:30px;
        font-size:40px;
        color:white;
        cursor:pointer;
    ">&times;</span>

    <img id="modalImg" style="
        margin-top:50px;
        max-width:90%;
        max-height:90%;
    ">

</div>

<script>
function openImage(src) {
    document.getElementById('imageModal').style.display = "block";
    document.getElementById('modalImg').src = src;
}

function closeImage() {
    document.getElementById('imageModal').style.display = "none";
}
</script>

</x-master-layout>
