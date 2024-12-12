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
      async function initMap() {

        const contentStringWD = `
          <div>
            <h1>예시 사건 1</h1>
            <div>
              <p>
                원자재 가격에 영향을 줄 수 있는 사건 설명이 들어가는 자리입니다. (공개 버전에서 원문 생략)
              </p>
            </div>
          </div>`;

        const contentStringseoul = `
          <div>
            <h1>예시 사건 2</h1>
            <div>
              <p>
                원자재 가격에 영향을 줄 수 있는 사건 설명이 들어가는 자리입니다. (공개 버전에서 원문 생략)
              </p>
            </div>
          </div>`;

        const contentStringRedSea = `
          <div>
            <h1>예시 사건 3</h1>
            <div>
              <p>
                원자재 가격에 영향을 줄 수 있는 사건 설명이 들어가는 자리입니다. (공개 버전에서 원문 생략)
              </p>
            </div>
          </div>`;

        const contentStringDamascus = `
          <div>
            <h1>예시 사건 4</h1>
            <div>
              <p>
                원자재 가격에 영향을 줄 수 있는 사건 설명이 들어가는 자리입니다. (공개 버전에서 원문 생략)
              </p>
            </div>
          </div>`;

        const contentStringGaza = `
          <div>
            <h1>예시 사건 5</h1>
            <div>
              <p>
                원자재 가격에 영향을 줄 수 있는 사건 설명이 들어가는 자리입니다. (공개 버전에서 원문 생략)
              </p>
            </div>
          </div>`;

        const infoWindowWD = new google.maps.InfoWindow({
          content: contentStringWD,
          ariaLabel: "예시 위치",
        });

        const infoWindowseoul = new google.maps.InfoWindow({
          content: contentStringseoul,
          ariaLabel: "예시 위치",
        });

        const infoWindowRedSea = new google.maps.InfoWindow({
          content: contentStringRedSea,
          ariaLabel: "예시 위치",
        });

        const infoWindowDamascus = new google.maps.InfoWindow({
          content: contentStringDamascus,
          ariaLabel: "예시 위치",
        });

        const infoWindowGaza = new google.maps.InfoWindow({
          content: contentStringGaza,
          ariaLabel: "예시 위치",
        });

        // 워싱턴 마커
        const markerWD = document.querySelector('gmp-advanced-marker#WD');
        markerWD.addEventListener('gmp-click', () => {
          infoWindowWD.open({ anchor: markerWD });
        });

        // 서울 마커
        const markerseoul = document.querySelector('gmp-advanced-marker#seoul');
        markerseoul.addEventListener('gmp-click', () => {
          infoWindowseoul.open({ anchor: markerseoul });
        });

        // 예시 마커
        const markerRedSea = document.querySelector('gmp-advanced-marker#redsea');
        markerRedSea.addEventListener('gmp-click', () => {
          infoWindowRedSea.open({ anchor: markerRedSea });
        });

        // 예시 마커
        const markerDamascus = document.querySelector('gmp-advanced-marker#damascus');
        markerDamascus.addEventListener('gmp-click', () => {
          infoWindowDamascus.open({ anchor: markerDamascus });
        });

        // 예시 마커
        const markerGaza = document.querySelector('gmp-advanced-marker#gaza');
        markerGaza.addEventListener('gmp-click', () => {
          infoWindowGaza.open({ anchor: markerGaza });
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
    <gmp-map center="38.90223960977045, -77.04196196785632" zoom="4" map-id="DEMO_MAP_ID">

      <gmp-advanced-marker id="WD" position="38.9072, -77.0369" title="예시 위치" gmp-clickable></gmp-advanced-marker>
      
      <gmp-advanced-marker id="seoul" position="37.533735, 127.072782" title="예시 위치" gmp-clickable></gmp-advanced-marker>

      <gmp-advanced-marker id="redsea" position="20.0, 38.0" title="예시 위치" gmp-clickable></gmp-advanced-marker>

      <gmp-advanced-marker id="damascus" position="33.5138, 36.2765" title="예시 위치" gmp-clickable></gmp-advanced-marker>

      <gmp-advanced-marker id="gaza" position="31.5, 34.4667" title="예시 위치" gmp-clickable></gmp-advanced-marker>
    </gmp-map>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&libraries=marker&v=beta&solution_channel=GMP_CCS_infowindows_v2"
      defer
    ></script>
  </body>
</html>