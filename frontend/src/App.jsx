import { useState } from 'react'
import heroImg from './assets/hero.png'
import reactLogo from './assets/react.svg'
import viteLogo from './assets/vite.svg'
import video from './assets/0001-0250.webm'
import Scene from './Scene/Scene'
import './App.css'

function App() {
  const [count, setCount] = useState(0)

  return (
    <>
      <div className='bg-slate-950 w-full h-screen relative'>
        {/* <video className='h-screen ' autoPlay muted loop>
          <source src={video}/>
        </video> */}
        <Scene className={' w-full h-screen flex items-center'}/>
      </div>
    </>
  )
}

export default App
