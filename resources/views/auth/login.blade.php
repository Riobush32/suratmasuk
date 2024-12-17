<x-layouts-auth>
    <div class="flex justify-center items-center">
        <div class="border-white border rounded-xl p-5 hover:scale-105 transition-all group">
            <div class="">
                <legend class="text-2xl">Login</legend>
                <hr class="my-2">
            </div>
            <form action="{{ route('login') }}" method="POST" class="">
                @csrf
                <label class="text-black form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text text-gray-50">Email</span>
                    </div>
                    <input type="email" name="email" id="email" class="bg-slate-700 border focus:-rotate-3 border-gray-300 text-gray-50 invalid:text-red-400 invalid:border-red-400 transition-all text-sm rounded-lg  block w-full p-2.5" placeholder="name@company.com" value="{{ old('email') }}" required />
                    
                </label>
                <label class="text-black form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text text-gray-50">Password</span>
                    </div>
                    <input type="password" name="password" id="password" class="bg-slate-700 border focus:-rotate-3  border-gray-300 transition-all text-gray-50 invalid:text-red-400 invalid:ring-red-400  text-sm rounded-lg  block w-full p-2.5" placeholder="**********" required />
                    
                </label>
                 <div class="mt-2 text-right">
                    <div class="">
                        <a class="text-sm hover:text-primary transition-all" href="{{ route('password.request') }}">forgot your password?</a>
                    </div>
                    <div class="">
                         <a class="text-sm hover:text-primary transition-all" href="{{ route('register') }}">do you have an account? register?</a>
                    </div>
                   
                 </div>

                <div class="mt-3 text-right">
                    <button type="submit" class="btn btn-primary text-white font-light tracking-widest text-lg">login</button>
                </div>
            </form>

        </div>
    </div>



</x-layouts-auth>
