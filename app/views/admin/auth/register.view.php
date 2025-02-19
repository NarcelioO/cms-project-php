<?php require base_path('views/partials/head.php');?>

<div class="min-h-full">
  
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="<?= asset('/imgs/logo_aceda.png');?>" alt="Your Company">
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm border p-8">
    <form class="space-y-6" action="/admin/auth/store" method="POST">
    <div>
        <label for="email" class="block text-sm/6 font-medium text-gray-900" >Nome</label>
        <div class="mt-2">
          <input 
          type="text" 
          name="name" 
          id="name" 
          autocomplete="name" 
          required 
          class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
          value="<?= $data['name'] ?? ''?>"
          placeholder="Seu nome"
          >
        </div>
      </div>
      <div>
        <label for="email" class="block text-sm/6 font-medium text-gray-900">Endereço de e-mail</label>
        <div class="mt-2">
          <input 
          type="email" 
          name="email" 
          id="email" 
          autocomplete="email" 
          required 
          class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
          value="<?= $data['email'] ?? ''?>"
          placeholder="Seu endereço de email"
          >
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm/6 font-medium text-gray-900">Senha</label>
        </div>
        <div class="mt-2">
          <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cadastrar</button>
      </div>
    </form>
      <?php if(!empty($errors)): ?>
        <ul class="mt-2">
          <?php foreach($errors as $error):?>
            <li class="p-2 w-full bg-red-200 border border-red-500 rounded text-sm text-center font-medium text-red-950 mt-2">
              <?php echo $error;?>
            </li>
          <?php endforeach ?>
        </ul>
      <?php endif; ?>
  </div>
</div>

</div>
    