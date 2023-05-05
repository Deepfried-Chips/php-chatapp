<script>
    import { router, page } from '@inertiajs/svelte';


    export let errors = {};

    let values = {
        email: null,
        password: null,
        _token: $page.props.csrf_token,
    }

    function handleSubmit() {
        router.post('/users/authenticate', values)
        console.log(values)
    }
</script>

<form on:submit|preventDefault={handleSubmit}>
    <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2">Email</label>
        <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" bind:value={values.email}/>

        {#if errors.email}
        <p class="text-red-500 text-xs mt-1">{errors.email}</p>
        {/if}
    </div>

    <div class="mb-6">
        <label for="password" class="inline-block text-lg mb-2">
          Password
        </label>
        <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" bind:value={values.password}/>

        {#if errors.password}
        <p class="text-red-500 text-xs mt-1">{errors.password}</p>
        {/if}
    </div>

    <div class="mb-6">
        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">Sign In</button>
    </div>

    <div class="mt-8">
        <p>
            <a href="/register" class="text-sky-800 hover:underline">Don't have an account? Register</a>
        </p>
    </div>
</form>
