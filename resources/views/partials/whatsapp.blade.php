<div id="whatsapp" class="bg-white pl-2 pt-2 row">
    <a href="https://wa.me/+96567757713" target="_blank" class="p-3">
        <i class="fa fa-whatsapp fa-2x"></i>
        <p class="m-0">{{ __('general.click_here') }}</p>
    </a>
    <p style="text-align: center;" class="col-12">
            <span style="font-weight: 600;">
                {{ __('general.contact_description') }}
            </span>
    </p>
</div>

<style>
    #whatsapp a {
        text-align: center;
        background-image: url('{{ asset('img/whatsapp-background.jpg') }}');
        margin: auto;
        border-radius: 28%;
    }

    #whatsapp a i{
        color: lightgreen;
        vertical-align: middle;
    }

    #whatsapp a p {
        color: lightcyan;
    }
</style>
