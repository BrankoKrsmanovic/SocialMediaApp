<template>
    <div class="row spinner">
        <div class="lds-dual-ring"></div>
    </div>
</template>

<style scoped>
    .spinner {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        width: 100%;
    }

    .lds-dual-ring {
        display: inline-block;
        width: 64px;
        height: 64px;
    }

    .lds-dual-ring:after {
        content: ' ';
        display: block;
        width: 146px;
        height: 146px;
        margin: 1px;
        border-radius: 50%;
        border: 5px solid #d18100;
        border-color: #d18100 transparent #5101d1 transparent;
        animation: lds-dual-ring 1.2s linear infinite;
    }

    @keyframes lds-dual-ring {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>
