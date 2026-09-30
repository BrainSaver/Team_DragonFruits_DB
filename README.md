# 🐉 Dragon Fruits — 원자재 가격 대시보드

금, 구리, 알루미늄, 천연가스, 국제유가 **5대 원자재**의 가격 흐름과 관련 뉴스, 국제 정세를 한 화면에서 볼 수 있는 웹 대시보드입니다.
외부 API(FRED, Polygon.io, NewsAPI)에서 데이터를 받아 MySQL에 저장하고, PHP로 조회해서 차트와 지도로 보여줍니다.

## 주요 기능

| 기능 | 설명 | 파일 |
|---|---|---|
| 회원 관리 | 회원가입, 로그인, 로그아웃, 이메일로 아이디 찾기 (쿠키 기반 세션, 비밀번호는 SHA-256 해시로 저장) | `prjTeamE/AccountManager/` |
| 실시간 시세 | 원자재 ETF(GLD, UNG, CPER, CENX, USO)의 전일 가격을 상단 바에 표시 | `Dashboard/realTime.php` |
| 가격 추이 그래프 | FRED 경제 데이터로 원자재별 과거 가격 라인 차트 | `Dashboard/make_graph.php` |
| 원자재 뉴스 | NewsAPI로 수집한 원자재 관련 최신 기사 목록 | `Dashboard/news.php` |
| 국제 정세 지도 | 원자재 가격에 영향을 주는 주요 사건을 Google Maps 마커로 표시 | `Dashboard/googleMap.php` |
| 기업·국가 통계 | 관련 기업 시가총액과 주요 석유 수출국 파이 차트 | `Dashboard/circle.html` |

## 기술 스택

| 분류 | 사용 기술 |
|---|---|
| **Backend** | PHP (절차형, `mysqli`) |
| **Database** | MySQL |
| **Frontend** | HTML, CSS, JavaScript |
| **시각화** | Google Charts (LineChart, PieChart), Google Maps JavaScript API (Advanced Marker) |
| **외부 API** | [FRED API](https://fred.stlouisfed.org/docs/api/fred/) (원자재 과거 가격), [Polygon.io](https://polygon.io/) (ETF 시세), [NewsAPI](https://newsapi.org/) (뉴스) |
| **개발 환경** | XAMPP 등 Apache + PHP + MySQL 로컬 서버 |
| **설정 관리** | `.env` 파일 + 자체 로더(`config.php`) |

## 폴더 구조

```
Team_DragonFruits_DB/
├── prjTeamE/                  # 실제 웹 애플리케이션
│   ├── index.php              # 진입점 (로그인 여부에 따라 이동)
│   ├── dashboard.php          # 메인 대시보드 (각 위젯을 iframe으로 배치)
│   ├── DBFiller.html          # DB 생성 및 데이터 수집 실행 페이지
│   ├── config.php             # .env 로더 (env() 함수)
│   ├── .env.example           # 환경변수 양식
│   ├── AccountManager/        # 회원가입, 로그인, 아이디 찾기
│   ├── Dashboard/             # 대시보드 위젯 (시세, 그래프, 뉴스, 지도, 통계)
│   └── database/              # DB·테이블 생성 스크립트와 API 데이터 수집 스크립트
├── Proposal01/, proposal02/   # 기획안
├── report/                    # 최종 보고서 (코드 사본 포함)
└── 회의록/                     # 회의록
```

### 데이터베이스

| DB | 테이블 | 내용 |
|---|---|---|
| `df` | `userdata` | 회원 정보 (id, pw 해시, email) |
| `commodities_data` | `gold_prices` 외 4개 | FRED 원자재 과거 가격 |
| `commodities_data_real_time` | `gold_prices` 외 4개 | Polygon ETF 시세 |
| `news` | `article` | 뉴스 기사 (제목, 요약, URL) |

## 실행 방법

### 1. 로컬 서버 준비
XAMPP 등으로 Apache와 MySQL을 실행하고, `prjTeamE` 폴더를 웹 루트(예: `htdocs`) 아래에 둡니다.

### 2. 환경변수 설정
`prjTeamE/.env.example`을 복사해서 `prjTeamE/.env`를 만들고 값을 채웁니다.

```env
DB_HOST=localhost
DB_USER=root
DB_PASS=MySQL 비밀번호

FRED_API_KEY=FRED에서 발급받은 키
NEWS_API_KEY=NewsAPI에서 발급받은 키
POLYGON_API_KEY=Polygon.io에서 발급받은 키
GOOGLE_MAPS_KEY=Google Cloud에서 발급받은 키
```

> ⚠️ `.env`는 `.gitignore`에 등록돼 있습니다. **절대 커밋하지 마세요.**

### 3. DB 생성 및 데이터 수집
브라우저에서 `http://localhost/prjTeamE/DBFiller.html`을 열고 순서대로 누릅니다.

1. **DB 만들기**: 모든 DB와 테이블 생성
2. **ETF Filler**: Polygon.io 실시간 시세 수집
3. **EDB Filler**: FRED 과거 가격 수집 (시간이 조금 걸립니다)
4. **News Filler**: 뉴스 기사 수집

데이터를 계속 최신으로 유지하려면 Filler 스크립트를 작업 스케줄러나 cron으로 주기적으로 실행하세요.

### 4. 접속
`http://localhost/prjTeamE/`에 접속해서 회원가입하고 로그인하면 대시보드가 열립니다.

## 참고
- Google Maps API 키가 없어도 지도 마커와 정보창 내용은 코드에서 확인할 수 있지만, 지도 자체는 키가 있어야 정상 표시됩니다.
- 로그인 상태는 1시간 동안 유지되는 쿠키로 관리합니다.
