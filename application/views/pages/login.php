<div class="flex items-start md:items-center h-screen justify-center">
    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
        <div class="flex flex-row md:flex-col items-center px-3 mb-2 md:mb-5 mt-10 md:mt-10">
            <div class="md:text-center">
                <div class="font-semibold text-2xl">
                    Login
                </div>
            </div>
        </div>		
		<?php if($this->session->flashdata('error') !== null) : ?>
			<div class="border border-red-600 bg-red-100 text-red-600 p-3 rounded mb-2">
				<?= $this->session->flashdata('error')['message']; ?>
			</div>
        <?php endif; ?>
        <div class="p-6 md:shadow-lg rounded-lg md:bg-white">
            <?= form_open('auth'); ?>
				<div class="mb-4">
					<label for="username" class="form-label">Username</label>
					<input class="form-input w-full rounded" type="text" name="username" id="username" required="required" value="<?= $this->input->get('username') ? $this->input->get('username') : '' ?>">
				</div>
				<div class="mb-4">
					<label for="password" class="form-label">Your password</label> 
					<input class="form-input w-full rounded" type="password" name="password" id="password" required="required">
				</div> 
				<div class="flex items-center justify-between">
					<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-blue-700 rounded shadow items-center w-full">Login</button>
				</div>
			<?= form_close(); ?>
        </div>
    </div>
</div>
