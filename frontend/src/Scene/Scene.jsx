import React, { Suspense, useRef } from 'react';
import { Canvas } from '@react-three/fiber';
import { OrbitControls, useGLTF, Helper  } from '@react-three/drei';
import * as THREE from 'three'; 

function Model() {
  // Langsung panggil string path dari folder public
  const { scene } = useGLTF('/headset.glb'); 
  
  return <primitive object={scene} scale={1} position={[-0, -0.1, -0]} />;
}

function Lights() {
  const dirLightRef = useRef();
  const pointLightRef = useRef();
  const spotLightRef = useRef();

  return (
    <>
      <ambientLight intensity={2} />

      {/* 1. Directional Light Helper */}
      <directionalLight 
        ref={dirLightRef} 
        position={[5, 10, 5]} 
        intensity={1.5} 
        color={'#FF3F00'}
      />
      {dirLightRef.current && <Helper ref={dirLightRef} type={THREE.DirectionalLightHelper} args={[1, 'yellow']} />}

      {/* 2. Point Light Helper */}
      <pointLight 
        ref={pointLightRef} 
        position={[-0.3, -0.1, -0.5]} 
        intensity={1.0}
        decay={3} 
        color={'#00454F'}
      />
      <pointLight 
        ref={pointLightRef} 
        position={[0.3, -0.1, 0.5]} 
        intensity={1.0}
        decay={3} 
        color={'#5F2F00'}
      />
      {pointLightRef.current && <Helper ref={pointLightRef} type={THREE.PointLightHelper} args={[0.5, 'cyan']} />}

      {/* 3. Spot Light Helper */}
      <spotLight 
        ref={spotLightRef} 
        position={[0, 0, 0]} 
        angle={5.3} 
        intensity={2.0} 
        color={'#FFFFFF'}
      />
      {spotLightRef.current && <Helper ref={spotLightRef} type={THREE.SpotLightHelper} args={['magenta']} />}
    </>
  );
}
export default function Scene({className}) {
  return (
    <div className={className}>
      <Canvas camera={{ position: [0.1, 0, 2], fov: 10 }}>
        <ambientLight intensity={0.7} />
        <Lights />

        <Suspense fallback={''}>
          <Model />
        </Suspense>

        <OrbitControls enableDamping />
      </Canvas>
    </div>
  );
}
