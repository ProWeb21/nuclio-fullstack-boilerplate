import React from 'react';
import Home from "./pages/home/home.view";
import style from './pages/home/home.module.css'

function App() {
  return (
    <body>
        <div className={style.__home_posts_wrapper } >
            <Home />
          </div>
    </body>
  );
}

export default App;
