<div class="h-1" style="background: linear-gradient(to right, rgb(77, 192, 181), rgb(52, 144, 220));"></div>
<nav id="header" class="font-sans flex flex-col text-center content-center sm:flex-row sm:text-left sm:justify-between py-2 px-6 bg-white shadow sm:items-baseline w-full">
  	<div class="mb-2 sm:mb-0 flex flex-row">
	    <div>
	      	<a href="<?= base_url() ?>" class="text-2xl no-underline text-grey-darkest hover:text-blue-dark font-sans font-bold">JADWAL OPERASI</a><br>
	    </div>
  	</div>

  	<div class="sm:mb-0 self-center flex flex-row">
		<div>
			<?= user()->employee_name ?>
	  	</div>
		<a href="<?=base_url('login/bye')?>" class="text-md no-underline text-black hover:text-blue-dark ml-2 px-1">
			<svg class="fill-current bg-red-700 border-red-700 text-gray-100 w-5 h-5 rounded p-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M20 10a10 10 0 1 1-20 0 10 10 0 0 1 20 0zm-2 0a8 8 0 1 0-16 0 8 8 0 0 0 16 0zm-8 2H5V8h5V5l5 5-5 5v-3z"/></svg>
		</a>
  	</div>
</nav>
