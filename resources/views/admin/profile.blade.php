<x-master-layout>

@php
$user = auth()->user();
@endphp

<!-- Country Plugin CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css"/>

<style>
.profile-container{
    max-width:1000px;
    margin:40px auto;
}

.profile-box{
    background:#f8f9fc;
    padding:30px;
    border-radius:12px;
}

.profile-title{
    font-weight:600;
    padding-bottom:10px;
    border-bottom:2px solid #4e73df;
    display:inline-block;
    margin-bottom:25px;
}

.profile-content{
    display:flex;
    gap:40px;
}

.profile-left{
    width:200px;
    text-align:center;
}

.profile-left img{
    width:140px;
    height:140px;
    border-radius:50%;
    object-fit:cover;
    background:#ddd;
}

.profile-right{
    flex:1;
}

.form-row{
    display:flex;
    gap:20px;
    margin-bottom:20px;
}

.form-group{
    flex:1;
}

.form-group label{
    font-weight:600;
    margin-bottom:6px;
    display:block;
}

.form-control{
    width:100%;
    padding:8px 5px;
    border:1px solid #ccc;
    border-radius:6px;
}

textarea.form-control{
    height:120px;
}

.btn-save{
    background:#4e73df;
    color:#fff;
    border:none;
    padding:8px 20px;
    border-radius:6px;
    float:right;
}

/* Fix plugin width */
.iti{
    width:100%;
}
</style>

<div class="profile-container">
<div class="profile-box">

<div class="profile-title">Profile</div>

<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
@csrf

<div class="profile-content">

    <!-- LEFT IMAGE -->
    <div class="profile-left">
        <img id="previewImage"
             src="{{ $user->image ? asset('uploads/profile/'.$user->image) : asset('default.png') }}">

        <div style="margin-top:10px;">
            <input type="file" name="image" id="imageUpload">
        </div>
    </div>

    <!-- RIGHT FORM -->
    <div class="profile-right">

        <div class="form-row">
            <div class="form-group">
                <label>Full Name *</label>
                <input type="text" name="name"
                       value="{{ $user->name }}"
                       class="form-control" required>
            </div>

            <div class="form-group">
                <label>Email *</label>
                <input type="email" name="email"
                       value="{{ $user->email }}"
                       class="form-control" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password"
                       class="form-control"
                       placeholder="Leave blank if not changing">
            </div>

            <!-- UPDATED CONTACT FIELD -->
            <div class="form-group">
                <label>Contact Number *</label>
                <input type="tel"
                       id="phone"
                       name="contact_number"
                       value="{{ $user->contact_number }}"
                       class="form-control"
                       required>
            </div>
        </div>

        <div class="form-group">
            <label>Address</label>
            <textarea name="address"
                      class="form-control"
                      required>{{ $user->address }}</textarea>
        </div>

        <button type="submit" class="btn-save">
            Save Changes
        </button>

    </div>

</div>

</form>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"></script>

<script>
var input = document.querySelector("#phone");

var iti = window.intlTelInput(input, {
    initialCountry: "in",
    preferredCountries: ["in", "us", "gb"],
    separateDialCode: false // IMPORTANT
});

// FORM SUBMIT pe full number save karega (+91 wala)
document.querySelector("form").addEventListener("submit", function () {
    input.value = iti.getNumber();
});
</script>




</x-master-layout>
