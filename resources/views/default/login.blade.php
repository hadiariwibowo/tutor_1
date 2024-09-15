<x-guest-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Masuk ke dalam aplikasi</h2>
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
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form id="form-registrasi" class="space-y-6" action="{{ route('guest.doLogin') }}" method="post">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Alamat Surel</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Isi alamat surel anda di sini...">
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Kata Sandi</label>
                        <div class="text-sm">
                            <a href="{{ route('guest.reset') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Lupa Kata Sandi ?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Isi kata sandi anda di sini...">
                    </div>
                </div>
				<div>
                    <input id="show-password" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="show-password" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tampilkan Kata Sandi</label>                
				</div>                
                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Masuk</button>
                </div>
            </form>
            <p class="mt-10 text-center text-sm text-gray-500">
                Belum punya akun ?
                <a href="{{ route('guest.register') }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Silahkan registrasi dahulu</a>
            </p>
        </div>
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