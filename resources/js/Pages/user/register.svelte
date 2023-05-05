<script>
    import { router, page } from '@inertiajs/svelte';

    export let errors = {};

    let values = {
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
        _token: $page.props.csrf_token,
    }

    function handleSubmit() {
        router.post('/users', values)
        console.log(values)
    }

</script>

<h1 class="text-xl font-bold">Generic Chatapp</h1>

<form on:submit|preventDefault={handleSubmit}>

    <div class="mb-6">
        <label for="name" class="inline-block text-lg mb-2"> Name </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" bind:value={values.name}/>

        {#if errors.name}<p class="text-red-500 text-xs mt-1">{errors.name}</p>{/if}
    </div>

    <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2">Email</label>
        <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" bind:value={values.email}/>

        {#if errors.email}<p class="text-red-500 text-xs mt-1">{errors.email}</p>{/if}
    </div>

    <div class="mb-6">
        <label for="password" class="inline-block text-lg mb-2">Password</label>
        <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" bind:value={values.password}/>

        {#if errors.password}<p class="text-red-500 text-xs mt-1">{errors.password}</p>{/if}
    </div>

    <div class="mb-6">
        <label for="password2" class="inline-block text-lg mb-2">Confirm Password</label>
        <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" bind:value={values.password_confirmation}/>

        {#if errors.password_confirmation}<p class="text-red-500 text-xs mt-1">{errors.password_confirmation}</p>{/if}
      </div>

    <div class="mb-6">
        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            Sign Up
        </button>
    </div>

      <div class="mt-8">
        <p>
            <a href="/login" class="text-sky-800 hover:underline">Already have an account? Login</a>
        </p>
    </div>
</form>