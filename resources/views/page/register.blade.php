@extends('layout.default')

@section('content')
<div class ="flex flex-col min-h-screen items-center justify-center ">
    <div class="sm:mx-auto sm:w-full sm:max-w-lg">
        <form class="space-y-2" action="#" method="POST" id="form">
            @csrf
            <div class="border-solid border-gray-300 border-2 rounded-lg">
                <label for="email" class="block text-sm font-normal leading-6 text-gray-400 px-2">Email address</label>
                <div class="my-1">
                    <input id="email" name="email" type="email" autocomplete="off" class="block w-full border-none py-1 text-gray-900 shadow-sm placeholder:text-gray-400 focus:outline-none sm:text-md sm:leading-6 px-2">
                </div>
            </div>
            <div class="flex flex-row gap-2 " >
                <div class="border-solid border-gray-300 border-2 rounded-lg basis-1/2">
                    <label for="firstName" class="block text-sm font-normal leading-6 text-gray-400 px-2">First Name</label>
                    <input id="firstName" name="firstName" type="text" autocomplete="off" class="block w-full border-none py-1 text-gray-900 shadow-sm placeholder:text-gray-400 focus:outline-none sm:text-md sm:leading-6 px-2">
                </div>
                <div class="border-solid border-gray-300 border-2 rounded-lg basis-1/2">
                    <label for="lastName" class="block text-sm font-normal leading-6 text-gray-400 px-2">Last Name</label>
                    <input id="lastName" name="lastName" type="text" autocomplete="off" class="block w-full border-none py-1 text-gray-900 shadow-sm placeholder:text-gray-400 focus:outline-none sm:text-md sm:leading-6 px-2">
                </div>
            </div>
            <div class="border-solid border-gray-300 border-2 rounded-lg">
                <label for="password" class="block text-sm font-normal leading-6 text-gray-400 px-2">Password</label>
                <div class="my-1">
                    <input id="password" name="password" type="password" autocomplete="off" class="block w-full border-none py-1 text-gray-900 shadow-sm placeholder:text-gray-400 focus:outline-none sm:text-md sm:leading-6 px-2">
                </div>
            </div>
            <div class="border-solid border-gray-300 border-2 rounded-lg">
                <label for="confirmPassword" class="block text-sm font-normal leading-6 text-gray-400 px-2">Confirm Password</label>
                <div class="my-1">
                    <input id="confirmPassword" name="confirmPassword" type="password" autocomplete="off" class="block w-full border-none py-1 text-gray-900 shadow-sm placeholder:text-gray-400 focus:outline-none sm:text-md sm:leading-6 px-2">
                </div>
            </div>
            <div>
                <button id="registerBtn" type="submit" class="flex w-full justify-center rounded-md font-semibold bg-blue-600 px-3 py-2.5 text-lg leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Register</button>
            </div>
        </form>


        <p class="mt-2 text-center text-sm text-gray-500">
            Already have an account?
            <a href="/login" class="font-semibold leading-6 text-blue-600 hover:text-blue-500 underline decoration-2 underline-offset-4">Login</a>
        </p>
        
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function(){
        const form = document.getElementById('form');
        const regBtn = document.getElementById("registerBtn");
        regBtn.disabled = true;
        regBtn.classList.remove("bg-blue-600", "hover:bg-blue-500");
        regBtn.classList.add("bg-gray-400", "cursor-not-allowed");

        const email = document.getElementById("email");
        const firstName = document.getElementById("firstName");
        const LastName = document.getElementById("lastName");
        const password = document.getElementById("password");
        const confirmPassword = document.getElementById("cofirmPassword");

        function validateEmail(email){
            const tempmail = /\S+@\S+\.\S+/;
            return tempmail.test(email);
        }

        function validatePassword(pass){
            const temppassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*d).{8,}$/;
            return temppassword.test(pass);
        }

        function validateName(name){
            const tempname = /^[a-zA-Z]*$/
            return tempname.test(name);
        }

        function validateConfirmPass(confirmPassword){
            if(confirmPassword === password)
            {
                return confirmPassword;
            }
        }

        const finalEmail = validateEmail(email);
        const finalFirstname = validateName(firstName);
        const finalLastName = validateName(LastName);
        const finalPassword = validatePassword(password);
        const finalConfirmPassword = validateConfirmPass(confirmPassword);

        if(finalEmail && finalFirstName && finalLastName && finalPassword && finalConfirmPassword)
        {
            regBtn.disabled = false;
            regBtn.classList.remove("bg-gray-400", "cursor-not-allowed");
            regBtn.classList.add("bg-blue-600", "hover:bg-blue-500");
        }
        else{
            regBtn.disabled = true;
            regBtn.classList.remove("bg-blue-600", "hover:bg-blue-500");
            regBtn.classList.add("bg-gray-400", "cursor-not-allowed");
        }

        form.addEventListener('submit', (e) =>{
            e.preventDefault();
            const email = document.getElementById("email");
            const firstName = document.getElementById("firstName");
            const LastName = document.getElementById("lastName");
            const password = document.getElementById("password");
            const confirmPassword = document.getElementById("cofirmPassword");
            const regBtn = document.getElementById("registerBtn");

            regBtn.disabled = true;
            regBtn.classList.remove("bg-blue-600", "hover:bg-blue-500");
            regBtn.classList.add("bg-gray-400", "cursor-not-allowed");
            if ((regBtn.disabled == true)) {
                regBtn.classList.remove("bg-blue-600", "hover:bg-blue-500");
                regBtn.classList.add("bg-gray-400", "cursor-not-allowed");
            }

            function validateEmail(email){
                const tempmail = /\S+@\S+\.\S+/;
                return tempmail.test(mail);
            }

            function validatePassword(pass){
                const temppassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*d).{8,}$/;
                return temppassword.test(pass);
            }

            function validateName(name){
                const tempname = /^[a-zA-Z]*$/
                return tempname.test(name);
            }

            function validateConfirmPass(confirmPassword){
                if(confirmPassword === password)
                {
                    return confirmPassword;
                }
            }

            const finalEmail = validateEmail(email);
            const finalFirstname = validateName(firstName);
            const finalLastName = validateName(LastName);
            const finalPassword = validatePassword(password);
            const finalConfirmPassword = validateConfirmPass(confirmPassword);

            if(finalEmail && finalFirstName && finalLastName && finalPassword && finalConfirmPassword)
            {
                regBtn.disabled = false;
                regBtn.classList.remove("bg-gray-400", "cursor-not-allowed");
                regBtn.classList.add("bg-blue-600", "hover:bg-blue-500");
            }
            else{
                regBtn.disabled = true;
                regBtn.classList.remove("bg-blue-600", "hover:bg-blue-500");
                regBtn.classList.add("bg-gray-400", "cursor-not-allowed");
            }
       
            alert("Berhasil");
        }) 
    })
</script>
@stop