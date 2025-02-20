<?php require base_path('views/partials/head.php');?>
<div class="min-h-full">
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="<?= asset('/imgs/logo_aceda.png');?>" alt="Your Company">
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm border p-8">
    <form class="space-y-6" action="/admin/auth/authenticate" method="POST">
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
          value="<?php $data['email'] ?? '';?>"
          placeholder="Seu endereço de email"
          >
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm/6 font-medium text-gray-900">Senha</label>
          <div class="text-sm">
            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Esqueceu a senha?</a>
          </div>
        </div>
        <div class="mt-2">
          <input 
          type="password" 
          name="password" 
          d="password" 
          autocomplete="current-password" 
          required 
          class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
          value="<?= $data['password'] ?? '' ?>"
          placeholder="Sua senha"
          >
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Acessar</button>
      </div>
    </form>

  </div>
</div>

</div>
    