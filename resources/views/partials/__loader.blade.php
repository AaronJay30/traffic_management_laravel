<style>
    .loading-screen {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #ffffff;
    z-index: 9999;
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .loader {
    border: 16px solid #f3f3f3;
    border-top: 16px solid green;
    border-radius: 50%;
    width: 120px;
    height: 120px;
    animation: spin 2s linear infinite;
    }

    @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
    }

</style>

<div class="loading-screen">
    <div class="loader"></div>
</div>

<script>
    window.addEventListener('load', function() {
      var loadingScreen = document.querySelector('.loading-screen');
      loadingScreen.style.display = 'flex';
  
      setTimeout(function() {
        loadingScreen.style.display = 'none';
      }, 2000); // Adjust the duration in milliseconds (e.g., 2000 for 2 seconds)
    });
  </script>