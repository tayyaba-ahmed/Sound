# Sound Website
A PHP-based entertainment platform hosting songs and videos in regional and English languages. The platform features dynamic filtering, user interaction through ratings and reviews, and full content control by administrators.

## Features
### User Panel
- **Dynamic Filtering:**
  - **Filter content by**:
    - *Artist:* View songs/videos by a specific artist.
    - *Genre & Language:* Dynamic suggestions based on the selected artist.
    - *Language:* Browse English or regional content.
    - *Albums:* Discover songs/videos by album.
- **Rate and Review:**
  - Add or modify ratings and reviews for songs/videos.
- **Playback Restriction:**
  - Only logged-in users can play songs/videos.
- **Latest Additions:**
   - Highlight newly added music and videos.
### Admin Panel
- **Content Management:**
  - Add, edit, or delete music/videos with categories like Year, Artist, Album, Genre, and Language.
- **User Management:**
  - Create and manage user accounts.
### General Features
- **Search Functionality:**
  - Search by name, artist, year, genre, or album.
- **Validations:**
  - Mandatory fields like Name, Address, Phone, and Email are validated during registration.

## Database Tables
1. **users:** Stores user information (name, email, phone, etc.).
2. **roles:** Defines user roles (e.g., admin, regular user).
3. **reviews:** Stores user ratings and reviews for music/videos.
4. **genre:** Contains music/video genres.
5. **lang:** Tracks languages (e.g., English, regional).
6. **music:** Stores music details (title, artist, album, genre, etc.).
7. **vid:** Stores video details (title, artist, album, genre, etc.).

## Tech Stack
- **Front-End:** Pre-designed themes from Google, customized for usability.
- **Back-End:** PHP for functionality, MySQL for database management.

## Setup
1. Clone the repository in your localdisk:C/xampp/htdocs
2. Import database.sql into MySQL.
3. Update database credentials in config.php.
4. Host on a local server (e.g., XAMPP).

## Highlights
- Advanced filtering options with dynamic dropdowns for artists, genres, languages, and albums.
- Secure playback restricted to logged-in users.
- Intuitive navigation designed for simplicity and ease of use.

## Contributors
- Tayyaba Ahmed
- Kabeer Ansari
