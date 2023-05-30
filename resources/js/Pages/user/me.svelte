<script>
    import { page, useForm } from '@inertiajs/svelte'
    import Cropper from 'cropperjs'
    import Editor from '../components/Editor.svelte'
    import { onMount } from 'svelte';

    const URL = window.URL || window.webkitURL

    let avatar

    export let errors = {}

    let form = useForm({
        name: $page.props.auth.user.name,
        email: null,
        password: null,
        password_confirmation: null,
        avatar: null,
        _token: $page.props.csrf_token,
    })

    function submit() {
        $form.post('/users/modify')
        console.log(errors)
    }
</script>

<form on:submit|preventDefault={submit}>
    <div class="mb-6">
        <label for="name" class="inline-block text-lg mb-2"> Name </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" bind:value={form.name}/>

        {#if errors.name}<p class="text-red-500 text-xs mt-1">{errors.name}</p>{/if}
    </div>

    <div class="mb-6">
        <label for="avatar" class="inline-block text-lg mb-2"> Avatar </label>
        <input type="file" class="border border-gray-200 rounded p-2 w-full" accept="image/*" name="avatar" on:input={e => $form.avatar = e.target.files[0]}/>

        {#if $form.avatar}
            <img src={URL.createObjectURL($form.avatar)} bind:this={avatar} alt="avatar" class="w-32 h-32 rounded-full mt-2"/>
        {/if}

        {#if errors.avatar}<p class="text-red-500 text-xs mt-1">{errors.avatar}</p>{/if}
    </div>

    <div class="mb-6">
        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            Update
        </button>
        {#if $form.progress}
        <progress value={$form.progress.percentage} max="100">
            {$form.progress.percentage}%
        </progress>
        {/if}
    </div>
</form>