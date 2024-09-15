<x-guest-layout>
	<div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
		<div class="mx-auto max-w-2xl text-center">
			<h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Registrasi</h2>
			<p class="mt-2 text-lg leading-8 text-gray-600">Silahkan untuk melakukan registrasi dan melakukan verifikasi agar akun dapat aktif digunakan.</p>
            @if ($errors->any())            
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Terjadi Kesalahan !</strong>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>                    
            @endif
            @if(session('success'))
            <div class="bg-blue-100 border border-blue-500 text-blue-700 px-4 py-3 rounded relative" role="alert">
                <p class="font-bold">Informasi</p>
                <p>{{ session('success') }}</p>
            </div>                            
            @endif
		</div>
		<form id="form-registrasi" action="{{ route('guest.doRegister') }}" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
			@csrf        
			<div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">        
				{{--  
				<div>
					<label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">First name</label>
					<div class="mt-2.5">
						<input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
					</div>
				</div>
				<div>
					<label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Last name</label>
					<div class="mt-2.5">
						<input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
					</div>
				</div>
				--}}
				<div class="sm:col-span-2">
					<label for="name" class="block text-sm font-semibold leading-6 text-gray-900">Nama</label>
					<div class="mt-2.5">
						<input type="text" name="name" id="name" required autocomplete="on" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Silahkan isi nama anda di sini...">
					</div>
				</div>
				<div class="sm:col-span-2">
					<label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Alamat Surel</label>
					<div class="mt-2.5">
						<input type="email" name="email" id="email" required autocomplete="on" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Silahkan isi alamat surel anda yang aktif di sini (misal xxxx@xxx.xxx)...">
					</div>
				</div>
				<div class="sm:col-span-2">
					<label for="password" class="block text-sm font-semibold leading-6 text-gray-900">Kata Sandi</label>
					<div class="mt-2.5">
						<input type="password" name="password" id="password" required autocomplete="on" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
					</div>
				</div>
				<div class="sm:col-span-2">
                    <input id="show-password" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="show-password" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tampilkan Kata Sandi</label>                
				</div>

				{{--  
				<div class="sm:col-span-2">
					<label for="phone-number" class="block text-sm font-semibold leading-6 text-gray-900">Phone number</label>
					<div class="relative mt-2.5">
						<div class="absolute inset-y-0 left-0 flex items-center">
							<label for="country" class="sr-only">Country</label>
							<select id="country" name="country" class="h-full rounded-md border-0 bg-transparent bg-none py-0 pl-4 pr-9 text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
								<option>US</option>
								<option>CA</option>
								<option>EU</option>
							</select>
							<svg class="pointer-events-none absolute right-3 top-0 h-full w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
								<path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
							</svg>
						</div>
						<input type="tel" name="phone-number" id="phone-number" autocomplete="tel" class="block w-full rounded-md border-0 px-3.5 py-2 pl-20 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
					</div>
				</div>
				<div class="sm:col-span-2">
					<label for="message" class="block text-sm font-semibold leading-6 text-gray-900">Message</label>
					<div class="mt-2.5">
						<textarea name="message" id="message" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
					</div>
				</div>
				<div class="flex gap-x-4 sm:col-span-2">
					<div class="flex h-6 items-center">
						<!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
						<button id="btnAgree" type="button" class="flex w-8 flex-none cursor-pointer rounded-full bg-indigo-600 p-px ring-1 ring-inset ring-gray-900/5 transition-colors duration-200 ease-in-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" role="switch" aria-checked="false" aria-labelledby="switch-1-label">
							<span class="sr-only">Agree to policies</span>
							<!-- Enabled: "translate-x-3.5", Not Enabled: "translate-x-0" -->
							<span aria-hidden="true" class="h-4 w-4 translate-x-3.5 transform rounded-full bg-white shadow-sm ring-1 ring-gray-900/5 transition duration-200 ease-in-out"></span>
						</button>
					</div>
					<label class="text-sm leading-6 text-gray-600" id="switch-1-label">
						By selecting this, you agree to our
						<a href="#" class="font-semibold text-indigo-600">privacy&nbsp;policy</a>.
					</label>
				</div>
                --}}

			{{--  <div class="mt-10"> --}}
                <div>
                    Silahkan <a href="{{ route('login') }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Masuk</a> bila telah terdaftar.
                </div>
                <div>
                    <button type="submit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Daftar</button>
                </div>
			</div>
		</form>
	</div>  
	@prepend('scripts')
	<script type="module">
		$(function() {
			$('#show-password').click(function() {
                if ($(this).is(':checked'))
                    $('#password').attr('type', 'text');
                else
                    $('#password').attr('type', 'password');
			});

            $('#form-registrasi').submit(function() {
                return confirm('Anda yakin data sudah benar ?');
            });
		});
	</script>	        
	@endprepend
</x-guest-layout>