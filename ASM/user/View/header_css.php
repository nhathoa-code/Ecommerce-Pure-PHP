<style>
  #user_container {
    position: absolute;
    width: 20vw;
    height: 0px;
    overflow: hidden;
    top: calc(1.5rem + 100%);
    left: -266%;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    background-color: white;
    box-shadow: -2px 2px 5px black;
    transition: height 0.5s ease-in-out;
  }

  #user_container h1 {
    font-weight: 500;
    color: #041e3a;
    margin-bottom: 1rem;
  }

  #user_container>div {
    margin-top: 1rem;
  }

  #user_container a {
    text-decoration: underline;
    color: #252525;
    margin-right: 1rem;
  }

  #user_icon:hover div {
    height: 100px;
  }

  @keyframes spin {
    from {
      transform: rotate(0deg);
    }

    to {
      transform: rotate(360deg);
    }
  }

  .loader {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    border: 1px solid #d0d8e0;
    border-top: 1px solid #000000;
    animation: spin 1s linear infinite;
  }

  .effect {
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(128, 128, 128, 0.1);
    z-index: 15;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  #signout {
    cursor: pointer;
  }

  #items {
    position: absolute;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    color: white;
    top: -30%;
    right: 0.25rem;
    font-size: 0.75rem;
    color: #041e3a;
  }

  .utility-nav {
    display: flex;
    align-self: center;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  }

  /*--------  Category   ----------*/


  #category {
    position: absolute;
    width: 100%;
    height: 0;
    top: 100%;
    left: 0;
    background-color: white;
    overflow: hidden;
    transition: height 0.5s ease-in-out;
  }

  #category>div>div {
    margin-right: 5rem;
  }

  #category>div>div a {
    text-decoration: none;
    color: #252525;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  #category>div>div>a {
    font-size: 1.5rem;
    color: #041e3a;
  }

  #category>div>div>ul {
    list-style-type: none;
  }

  #category>div>div>ul>li {
    padding: 0.5rem 0;
  }

  #category>div {
    display: flex;
    flex-wrap: wrap;
    padding-left: 26.5%;
  }

  /*--------  Search   ----------*/
  #search-container {
    position: absolute;
    top: 100%;
    left: 0;
    height: 0;
    overflow: hidden;
    width: 100%;
    background-color: white;
    transition: 0.5s height;
  }

  #search-box {
    width: 60%;
    margin: 50px auto;
    display: flex;
    align-items: center;
    border-bottom: 1px solid black;
  }

  #search-box>input {
    flex: 1;
    border: none;
    padding: 0.5rem 1rem;
    font-size: 1.5rem;
    color: #041e3a;

  }

  #search-box>i {
    font-size: 1.25rem;
    color: #9d9fa3;
  }

  #search-box>input::placeholder {
    letter-spacing: 0.2rem;
    color: #9d9fa3;
  }

  #search-box>input:focus {
    outline: none;
  }

  #search-result {
    height: 25vh;
    width: 60%;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    column-gap: 1rem;
    margin: 10px auto;

  }

  #search-result img {
    width: 100%;
    height: auto;
  }

  #search-result>div {
    display: grid;
    grid-template-columns: 1fr 1fr;
    column-gap: 0.5rem;
  }

  #search-container #view-all a {
    text-decoration: none;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: transparent;
    border: 0;
    min-height: 0;
    margin: 0;
    padding: 0 0 0.25rem;
    color: #041e3a;
    width: auto;
    text-transform: uppercase;
    position: relative;
    cursor: pointer;
  }

  #search-container #view-all a:hover::after {
    top: 90%;
  }

  #search-container #view-all a::after {
    content: "";
    position: absolute;
    width: 100%;
    height: 1px;
    background-color: #041e3a;
    top: 110%;
    left: 0;
    transition: top 0.3s;
  }

  #view-all {
    display: none;
  }

  #empty-search {
    color: #041e3a;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: 400;
    text-align: center;
    font-size: 3rem;
  }

  #search-result .brandname {
    color: #b6b6b6;
    font-size: 0.75rem;
  }

  #search-result .name {
    color: #041e3a;
    font-family: Founders Grotesk text Regular, Helvetica, Arial, sans-serif;
    font-size: 1rem;
    margin: 0.5rem 0;
  }

  #search-result .price {
    color: #041e3a;
    font-size: 1rem;
    font-family: Founders Grotesk text Regular, Helvetica, Arial, sans-serif;
  }
</style>