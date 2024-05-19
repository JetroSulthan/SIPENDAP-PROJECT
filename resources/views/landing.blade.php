
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Homepage</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="icon" href="public/img/sipendapicon.png" type="image/png">
    @vite(['resources/css/app.css','resources/js/app.js'])
  </head>
<body>
  
  <div class="video-background">
    <video autoplay muted loop playsinline>
        <source src="img/video.mp4" type="video/mp4">
    </video>
  </div>
  <div class="content">
    <h1 style="color: rgb(19, 190, 0);">SIPENDAP</h1>
  </div>
  
  <div class="box">
    <div class="dropdown">Login Sebagai
        <span class="left-icon"></span>
        <span class="right-icon"></span>
        <div class="items">
            <a href="/login" style="--i:1;"><span></span>Kelompok Tani</a>
            <a href="/login" style="--i:2;"><span></span>Pemerintah</a>
            <a href="/login" style="--i:3;"><span></span>Admin</a>
        </div>
    </div>
  </div>
  
  <div class="membantu">
    <p style="color: rgb(135, 147, 135);">
      Membantu lebih dari 1000+ petani mendapat <br>
      bantuan pupuk langsung dari pemerintah! </p>
  </div>
  
  
  
  <div class="glass-rectangle"> </div>
  
  
  <div class="scroller" data-speed="fast">
    <ul class="tag-list scroller__inner">
  
      <li>Mudah</li>
      <li>Cepat</li>
      <li>Efektif</li>
      <li>Dapat Dipercaya</li>
      <li>Supportif</li>
      <li>Terkini</li>
     
    </ul>
  </div>
  
  
  <button class="chatbot-toggler">  
      <span class="material-symbols-rounded">+</span>
      <span class="material-symbols-outlined">v</span>
    </button>
    <div class="chatbot">
      <header>
        <h2>SIPENDAP ASSIST</h2>
        <span class="close-btn material-symbols-outlined">close</span>
      </header>
      <ul class="chatbox">
        <li class="chat incoming">
          <span class="material-symbols-outlined"> + </span>
          <p>Halo SIPENDAPERS👋<br>Selamat datang di Virtual Assisten, ada yang bisa saya bantu?<br><br>Ketik halo untuk memulai! </p>
        </li>
      </ul>
      <div class="chat-input">
        <textarea placeholder="Masukkan Pesan..." spellcheck="false" required></textarea>
        <span id="send-btn" class="material-symbols-rounded">send</span>
      </div>
    </div>
  
  <style>
  
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
  
  * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
  }
  
  .box {
      position: relative;
      width: 250px;
      height: 250px;
      margin-left: auto;
      margin-right: auto;
  }
  
  .dropdown {
      position: relative;
      width: 100%;
      height: 60px;
      background: #72B944;
      color: #fff;
      font-size: 22px;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 5px;
      cursor: pointer;
      box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
  }
  
  .dropdown .left-icon,
  .dropdown .right-icon {
      position: relative;
      top: 2px;
      display: inline-block;
      width: 15px;
      height: 5px;
      background: #fff;
      border-radius: 40px;
      transition: .5s;
  }
  
  .dropdown .left-icon {
      left: 7px;
      transform: rotate(45deg);
  }
  
  .dropdown.active .left-icon {
      transform: rotate(135deg);
  }
  
  .dropdown .right-icon {
      transform: rotate(-45deg);
  }
  
  .dropdown.active .right-icon {
      transform: rotate(-135deg);
  }
  
  .dropdown .items {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 160px;
      margin-top: 63px;
      overflow: hidden;
      visibility: hidden;
      transition: .5s;
  }
  
  .dropdown.active .items {
      visibility: visible;
  }
  
  .dropdown .items a {
      position: relative;
      left: 100%;
      display: flex;
      font-size: 20px;
      background: #fff;
      color: #72B944;
      text-decoration: none;
      border-radius: 5px;
      padding: 10px 15px;
      margin-top: 2.5px;
      z-index: 1;
      overflow: hidden;
      transition: .5s;
      transition-delay: calc(60ms * var(--i));
  }
  
  .dropdown.active .items a {
      left: 0;
  }
  
  .dropdown .items a:hover {
      color: #fff;
  }
  
  .dropdown .items a span {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: #72B944;
      z-index: -1;
      border-radius: inherit;
      transform: rotate(160deg);
      transform-origin: right;
      transition: .5s;
  }
  
  .dropdown .items a:hover span {
      transform: rotate(0deg);
  }
  
  
  
  .membantu {
      justify-content: center; /* Center horizontally */
      align-items: center; /* Center vertically */
      text-align: center; /* Center text */
      margin-bottom: 50px;
  }
  
  .glass-rectangle {
      position: fixed;
      top: 0;
      left: 0;
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      z-index: -1000;
      overflow: hidden;
  
      background: rgba(255, 255, 255, 0.15); /* Transparent white background */
      backdrop-filter: blur(5px); /* Apply blur effect */
      border-radius: 10px; /* Soften the edges */
      border: 1px solid rgba(255, 255, 255, 0.2); /* Border for contrast */
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37); /* Soft shadow */
      backdrop-filter: blur(4px); /* Soften the background */
      overflow: hidden; /* Hide content overflow */
  }
  
  .glass-rectangle-content {
      padding: 20px; /* Add padding for content */
      color: black; /* Text color */
      justify-content: center; /* Center horizontally */
      align-items: center; /* Center vertically */
      height: 100%; /* Ensure content takes up full height */
      text-align: center; /* Center text */
  }
  
  
  .video-background {
      position: fixed;
      top: 0;
      left: 0;
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      z-index: -1000;
      overflow: hidden;
  }
  
  video {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transform: translate(-50%, -50%);
  }
  .content {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
      color: #FFF;
      justify-content: center;
      align-items: center;
      text-align: center;
      font-family: Arial, sans-serif;
  }
  .content h1 {
      font-size: 4em;
      margin-bottom: 20px;
      font-family: poppins;
  }
  .content a {
      text-decoration: none;
      display: inline-block;
      color: #fff;
      font-size: 24px;
      border: 2px solid #fff;
      padding: 14px 70px;
      border-radius: 50px;
      margin-top: 200px;
  }
  
  
  
  .scroller {
      max-width: 900px;
      margin-bottom: 200px;
    }
    
    .scroller__inner {
      padding-block: 1rem;
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
    }
    
    .scroller[data-animated="true"] {
      overflow: hidden;
      -webkit-mask: linear-gradient(
        90deg,
        transparent,
        white 20%,
        white 80%,
        transparent
      );
      mask: linear-gradient(90deg, transparent, white 20%, white 80%, transparent);
    }
    
    .scroller[data-animated="true"] .scroller__inner {
      width: max-content;
      flex-wrap: nowrap;
      animation: scroll var(--_animation-duration, 40s)
        var(--_animation-direction, forwards) linear infinite;
    }
  
    
    .scroller[data-direction="left"] {
      --_animation-direction: forwards;
    }
    
    .scroller[data-speed="fast"] {
      --_animation-duration: 40s;
    }
  
    
    @keyframes scroll {
      to {
        transform: translate(calc(-50% - 0.5rem));
      }
    }
  
    html {
      color-scheme: dark;
    }
    
    body {
      display: grid;
      margin-top: 400px;
      min-block-size: 100vh;
      place-content: center;
      font-family: system-ui; 
      font-size: 1.125rem;
    }
    
    .tag-list {
      margin: 0;
      padding-inline: 0;
      list-style: none;
    }
    
    .tag-list li {
      padding: 1rem;
      background-color: transparent;
      border: 1px solid #eceff133;
      border-radius: 0.5rem;
    }
  
  
  
  
  .login{
      background-color:none ;
      /* justify-items: center; */
      /* justify-content: center; */
      /* align-items: center; */
      /* align-content: center; */
      display: flex;
      margin-top: 200px;
  }
  
  .login a{
      text-decoration: underline;
      color: blue;
  }
  
  .box_regist{
      display: flex;
      margin-top:150px;
      margin-x:50px;
      background-color: 
  }
  
  .container{
      display: flex;
      /* margin-top: 50px;  */
  
  }
  
  .container_kiri h1{
      margin-left: 80px;
      margin-top: 80px; 
      font-size: 70px;
      font-family: Red Hat display;
      font-weight: 900;
  }
  
  .container_kiri p{
      font-family: Red Hat display;
      font-size: 27px;
      margin-left: 80px;
  }
  
  .container_kanan {
      margin-left: 240px;
  }
  
  .box{
      display: flex;
      background-color: FFFFFF;
  }
  
  /* Import Google font - Poppins */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }
  
  /* body {
    background: #E3F2FD;
  } */
  
  .chatbot-toggler {
    position: fixed;
    bottom: 30px;
    right: 35px;
    outline: none;
    border: none;
    height: 50px;
    width: 50px;
    display: flex;
    cursor: pointer;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #08b808;
    transition: all 0.2s ease;
  }
  body.show-chatbot .chatbot-toggler {
    transform: rotate(90deg);
  }
  .chatbot-toggler span {
    color: #fff;
    position: absolute;
  }
  .chatbot-toggler span:last-child,
  body.show-chatbot .chatbot-toggler span:first-child  {
    opacity: 0;
  }
  body.show-chatbot .chatbot-toggler span:last-child {
    opacity: 1;
  }
  .chatbot {
    position: fixed;
    right: 35px;
    bottom: 90px;
    width: 420px;
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    opacity: 0;
    pointer-events: none;
    transform: scale(0.5);
    transform-origin: bottom right;
    box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
                0 32px 64px -48px rgba(0,0,0,0.5);
    transition: all 0.1s ease;
  }
  body.show-chatbot .chatbot {
    opacity: 1;
    pointer-events: auto;
    transform: scale(1);
  }
  .chatbot header {
    padding: 16px 0;
    position: relative;
    text-align: center;
    color: #fff;
    background: #08b808;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  }
  .chatbot header span {
    position: absolute;
    right: 15px;
    top: 50%;
    display: none;
    cursor: pointer;
    transform: translateY(-50%);
  }
  header h2 {
    font-size: 1.4rem;
  }
  .chatbot .chatbox {
    overflow-y: auto;
    height: 510px;
    padding: 30px 20px 100px;
  }
  .chatbot :where(.chatbox, textarea)::-webkit-scrollbar {
    width: 6px;
  }
  .chatbot :where(.chatbox, textarea)::-webkit-scrollbar-track {
    background: #fff;
    border-radius: 25px;
  }
  .chatbot :where(.chatbox, textarea)::-webkit-scrollbar-thumb {
    background: #ccc;
    border-radius: 25px;
  }
  .chatbox .chat {
    display: flex;
    list-style: none;
  }
  .chatbox .outgoing {
    margin: 20px 0;
    justify-content: flex-end;
  }
  .chatbox .incoming span {
    width: 32px;
    height: 32px;
    color: #fff;
    cursor: default;
    text-align: center;
    line-height: 32px;
    align-self: flex-end;
    background: #08b808;
    border-radius: 4px;
    margin: 0 10px 7px 0;
  }
  .chatbox .chat p {
    white-space: pre-wrap;
    padding: 12px 16px;
    border-radius: 10px 10px 0 10px;
    max-width: 75%;
    color: #fff;
    font-size: 0.95rem;
    background: #724ae8;
  }
  .chatbox .incoming p {
    border-radius: 10px 10px 10px 0;
  }
  .chatbox .chat p.error {
    color: #721c24;
    background: #f8d7da;
  }
  .chatbox .incoming p {
    color: #000;
    background: #f2f2f2;
  }
  .chatbot .chat-input {
    display: flex;
    gap: 5px;
    position: absolute;
    bottom: 0;
    width: 100%;
    background: #fff;
    padding: 3px 20px;
    border-top: 1px solid #ddd;
  }
  .chat-input textarea {
    height: 55px;
    width: 100%;
    border: none;
    outline: none;
    resize: none;
    max-height: 180px;
    padding: 15px 15px 15px 0;
    font-size: 0.95rem;
    color: #000; /* Set text color to black */

  }
  .chat-input span {
    align-self: flex-end;
    color: #724ae8;
    cursor: pointer;
    height: 55px;
    display: flex;
    align-items: center;
    visibility: hidden;
    font-size: 1.35rem;
  }
  .chat-input textarea:valid ~ span {
    visibility: visible;
  }
  
  @media (max-width: 490px) {
    .chatbot-toggler {
      right: 20px;
      bottom: 20px;
    }
    .chatbot {
      right: 0;
      bottom: 0;
      height: 100%;
      border-radius: 0;
      width: 100%;
    }
    .chatbot .chatbox {
      height: 90%;
      padding: 25px 15px 100px;
    }
    .chatbot .chat-input {
      padding: 5px 15px;
    }
    .chatbot header span {
      display: block;
    }
  }
  
  </style>
  
  <script>
  
  const dropdown = document.querySelector('.dropdown');
  
  dropdown.addEventListener('click', () => {
      dropdown.classList.toggle('active');
  });
  
  
  
  const chatbotToggler = document.querySelector(".chatbot-toggler");
  const closeBtn = document.querySelector(".close-btn");
  const chatbox = document.querySelector(".chatbox");
  const chatInput = document.querySelector(".chat-input textarea");
  const sendChatBtn = document.querySelector(".chat-input span");
  
  let userMessage = null; // Variable to store user's message
  const inputInitHeight = chatInput.scrollHeight;
  
  const createChatLi = (message, className) => {
      // Create a chat <li> element with passed message and className
      const chatLi = document.createElement("li");
      chatLi.classList.add("chat", `${className}`);
      let chatContent = className === "outgoing" ? `<p>${message}</p>` : `<span class="material-symbols-outlined">smart_toy</span><p>${message}</p>`;
      chatLi.innerHTML = chatContent;
      return chatLi; // return chat <li> element
  }
  
  const generateResponse = (userMessage) => {
      // Define responses based on user input using if-else conditions
      let response;
      if (userMessage.toLowerCase().includes("halo")) {
          response = "Halo! Ada yang bisa saya bantu? Mohon Ketik 1 untuk Penjelasan, Ketik 2 untuk Cara Penggunaan";
      } else if (userMessage.toLowerCase().includes("1")) {
          response = "SIPENDAP adalah Sistem Pendistribusian Pupuk subsidi yang lebih efisien!😊 (Ada lagi yang ingin ditanyakan?(Ketik iya/tidak))";
      } else if (userMessage.toLowerCase().includes("2")) {
          response = "Cara menggunakan SIPENDAP adalah, silahkan Login terlebih dahulu ya!(Ada lagi yang ingin ditanyakan?(Ketik iya/tidak))";
      } else if (userMessage.toLowerCase().includes("tidak")) {
          response = "Terimakasih :)";
      } else if (userMessage.toLowerCase().includes("iya")) {
          response = "Baik, masih ada yang belum jelas??? Ketik 1 untuk penjelasan, Ketik 2 untuk cara penggunaan!";
      } else {
          // Default response if no specific condition matches
          response = "Wah maaf, saya masih belum bisa menjawab itu, mohon untuk pilih sesuai dengan angka ya!";
      }
      
      return response;
  }
  
  const handleChat = () => {
      userMessage = chatInput.value.trim(); // Get user entered message and remove extra whitespace
      if(!userMessage) return;
  
      // Clear the input textarea and set its height to default
      chatInput.value = "";
      chatInput.style.height = `${inputInitHeight}px`;
  
      // Append the user's message to the chatbox
      chatbox.appendChild(createChatLi(userMessage, "outgoing"));
      chatbox.scrollTo(0, chatbox.scrollHeight);
      
      setTimeout(() => {
          // Display "Thinking..." message while waiting for the response
          const incomingChatLi = createChatLi("Sedang Berpikir....", "incoming");
          chatbox.appendChild(incomingChatLi);
          chatbox.scrollTo(0, chatbox.scrollHeight);
          
          // Generate response based on user input
          const botResponse = generateResponse(userMessage);
          
          // Update chatbox with bot's response
          const messageElement = incomingChatLi.querySelector("p");
          messageElement.textContent = botResponse;
          chatbox.scrollTo(0, chatbox.scrollHeight);
      }, 600);
  }
  
  chatInput.addEventListener("input", () => {
      // Adjust the height of the input textarea based on its content
      chatInput.style.height = `${inputInitHeight}px`;
      chatInput.style.height = `${chatInput.scrollHeight}px`;
  });
  
  chatInput.addEventListener("keydown", (e) => {
      // If Enter key is pressed without Shift key and the window 
      // width is greater than 800px, handle the chat
      if(e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
          e.preventDefault();
          handleChat();
      }
  });
  
  sendChatBtn.addEventListener("click", handleChat);
  closeBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));
  chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));
  
  const scrollers = document.querySelectorAll(".scroller");
    addAnimation();
  
  function addAnimation() {
    scrollers.forEach((scroller) => {
      scroller.setAttribute("data-animated", true);
  
      const scrollerInner = scroller.querySelector(".scroller__inner");
      const scrollerContent = Array.from(scrollerInner.children);
      scrollerContent.forEach((item) => {
        const duplicatedItem = item.cloneNode(true);
        duplicatedItem.setAttribute("aria-hidden", true);
        scrollerInner.appendChild(duplicatedItem);
      });
    });
  }
  
  
  </script>

</body> 
</html>


