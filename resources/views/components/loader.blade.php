@props(['duration' => 1000])

<style>
    #loader-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #ffffff;
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: opacity 0.5s ease;
    }
    .loader-dots {
        display: flex;
        gap: 12px;
    }
    .loader-dots span {
        width: 16px;
        height: 16px;
        background-color: #2c7da0;
        border-radius: 50%;
        display: inline-block;
        animation: jiggle 0.6s ease-in-out infinite;
    }
    .loader-dots span:nth-child(1) { animation-delay: 0s; }
    .loader-dots span:nth-child(2) { animation-delay: 0.15s; }
    .loader-dots span:nth-child(3) { animation-delay: 0.3s; }
    @keyframes jiggle {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-20px);
        }
    }
</style>

<div id="loader-wrapper">
    <div class="loader-dots">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>

<script>
    (function() {
        var duration = {{ $duration }};
        setTimeout(function() {
            var loader = document.getElementById('loader-wrapper');
            if (loader) {
                loader.style.opacity = '0';
                setTimeout(function() {
                    loader.style.display = 'none';
                }, 500);
            }
        }, duration);
    })();
</script>