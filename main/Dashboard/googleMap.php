<!doctype html>
<html>
  <head>
    <title>Info Windows</title>
    <script>
      /**
       * @license
       * Copyright 2023 Google LLC. All Rights Reserved.
       * SPDX-License-Identifier: Apache-2.0
       */

      // 이 예제는 울루루와 리야드의 마커를 표시합니다.
      // 사용자가 마커를 클릭하면 정보 창이 열립니다.
      async function initMap() {
        // 울루루의 정보 창 내용
        const contentStringUluru = `
          <div>
            <h1>예시 사건 1</h1>
            <div>
              <p>
                원자재 가격에 영향을 줄 수 있는 사건 설명이 들어가는 자리입니다. (공개 버전에서 원문 생략)
              </p>
            </div>
          </div>`;

        // 리야드의 정보 창 내용
        const contentStringRiyadh = `
          <div>
            <h1>예시 사건 2</h1>
            <div>
              <p>
                원자재 가격에 영향을 줄 수 있는 사건 설명이 들어가는 자리입니다. (공개 버전에서 원문 생략)
              </p>
            </div>
          </div>`;

        // 정보 창 객체 생성
        const infoWindowUluru = new google.maps.InfoWindow({
          content: contentStringUluru,
          ariaLabel: "울루루",
        });

        const infoWindowRiyadh = new google.maps.InfoWindow({
          content: contentStringRiyadh,
          ariaLabel: "리야드",
        });

        // 울루루 마커
        const markerUluru = document.querySelector('gmp-advanced-marker#uluru');
        markerUluru.addEventListener('gmp-click', () => {
          infoWindowUluru.open({ anchor: markerUluru });
        });

        // 리야드 마커
        const markerRiyadh = document.querySelector('gmp-advanced-marker#riyadh');
        markerRiyadh.addEventListener('gmp-click', () => {
          infoWindowRiyadh.open({ anchor: markerRiyadh });
        });
      }

      window.initMap = initMap;
    </script>
    <style>
      html, body {
        height: 100%;
        margin: 0;
      }
    </style>
  </head>
  <body>
    <gmp-map center="-25.363, 131.044" zoom="4" map-id="DEMO_MAP_ID">
      <!-- 울루루 마커 -->
      <gmp-advanced-marker id="uluru" position="-25.363, 131.044" title="예시 위치" gmp-clickable></gmp-advanced-marker>
      
      <!-- 리야드 마커 -->
      <gmp-advanced-marker id="riyadh" position="24.7136, 46.6753" title="예시 위치" gmp-clickable></gmp-advanced-marker>
    </gmp-map>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&libraries=marker&v=beta&solution_channel=GMP_CCS_infowindows_v2"
      defer
    ></script>
  </body>
</html>
