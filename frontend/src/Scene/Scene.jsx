import React, { Suspense, useRef } from 'react';
import { Canvas } from '@react-three/fiber';
import { OrbitControls, useGLTF, Helper  } from '@react-three/drei';
import * as THREE from 'three'; 

function Model() {
  // Langsung panggil string path dari folder public
  const { scene } = useGLTF('/car.glb'); 
  
  return <primitive object={scene} scale={0.1} position={[-0, -0.5, -15]} />;
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
        position={[-3, 3, -3]} 
        intensity={5.0} 
        color={'#FFFF00'}
      />
      {pointLightRef.current && <Helper ref={pointLightRef} type={THREE.PointLightHelper} args={[0.5, 'cyan']} />}

      {/* 3. Spot Light Helper */}
      <spotLight 
        ref={spotLightRef} 
        position={[0, 20, 0]} 
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
      {/* Perbaikan pada posisi kamera (menggunakan format array [x, y, z]) */}
      <Canvas camera={{ position: [60, 0, 5], fov: 10 }}>
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
