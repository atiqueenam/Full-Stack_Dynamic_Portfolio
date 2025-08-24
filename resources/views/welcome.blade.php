@extends('index')
@section('main-content')
@push('styles')
<title>Atique Enam - Portfolio | ScienThush</title>
<style>
/* Modern Portfolio Styles */
:root {
  --primary-color: #00f5ff;
  --secondary-color: #ff0080;
  --accent-color: #7b68ee;
  --bg-dark: #0a0a0a;
  --bg-card: rgba(255, 255, 255, 0.05);
  --text-light: #ffffff;
  --text-dark: #1a1a2e;
  --text-glass: #2c2c54;
  --text-muted: #b0b0b0;
}

/* Particle Animation Background */
.particles-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
  background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 50%, #16213e 100%);
  overflow: hidden;
}

.particle {
  position: absolute;
  width: 2px;
  height: 2px;
  background: var(--primary-color);
  border-radius: 50%;
  animation: float 8s infinite ease-in-out;
  opacity: 0.7;
}

@keyframes float {
  0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.7; }
  50% { transform: translateY(-100px) rotate(180deg); opacity: 1; }
}

/* Hero Section */
.hero-section {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  overflow: hidden;
  background: transparent;
  padding: 50px 20px;
}

.hero-content {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 50px;
  max-width: 1200px;
  width: 100%;
  align-items: center;
}

.hero-text {
  color: var(--text-light);
}

.hero-text h1 {
  font-size: 3.5rem;
  font-weight: 900;
  margin-bottom: 20px;
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.hero-text .subtitle {
  font-size: 1.5rem;
  color: var(--accent-color);
  margin-bottom: 15px;
  font-weight: 600;
}

.hero-text .description {
  font-size: 1.1rem;
  line-height: 1.8;
  color: var(--text-muted);
  margin-bottom: 30px;
}

/* Profile Picture */
.hero-image {
  text-align: center;
}

.profile-container {
  position: relative;
  width: 300px;
  height: 400px;
  margin: 0 auto;
  border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color), var(--accent-color));
  padding: 4px;
  animation: profileGlow 3s ease-in-out infinite;
}

.profile-inner {
  width: 100%;
  height: 100%;
  border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
  overflow: hidden;
  position: relative;
  background: var(--bg-dark);
}

.profile-inner img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center top;
  filter: brightness(1.1) contrast(1.1);
}

@keyframes profileGlow {
  0%, 100% { box-shadow: 0 0 20px rgba(0, 245, 255, 0.5); }
  50% { box-shadow: 0 0 40px rgba(255, 0, 128, 0.7); }
}

/* About Section */
.about-section {
  padding: 100px 20px;
  background: rgba(0, 0, 0, 0.3);
  backdrop-filter: blur(10px);
}

.about-container {
  max-width: 1200px;
  margin: 0 auto;
}

.section-title {
  font-size: 3rem;
  color: var(--text-light);
  text-align: center;
  margin-bottom: 50px;
  position: relative;
  text-transform: uppercase;
  letter-spacing: 3px;
}

.section-title::after {
  content: '';
  position: absolute;
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
  width: 100px;
  height: 3px;
  background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
}

.about-grid {
  display: grid;
  grid-template-columns: 2fr 1fr;
  gap: 50px;
  align-items: start;
}

.about-text {
  color: var(--text-light);
  font-size: 1.1rem;
  line-height: 1.8;
}

.about-section-card {
  background: var(--bg-card);
  border: 1px solid rgba(0, 245, 255, 0.2);
  border-radius: 15px;
  padding: 30px;
  margin-bottom: 30px;
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
}

.about-section-card:hover {
  transform: translateY(-5px);
  border-color: var(--primary-color);
  box-shadow: 0 15px 35px rgba(0, 245, 255, 0.2);
}

.about-section-card h3 {
  color: var(--primary-color);
  margin-bottom: 15px;
  font-size: 1.4rem;
  display: flex;
  align-items: center;
  gap: 12px;
}

.about-section-card h3 i {
  color: var(--accent-color);
}

.about-section-card p {
  color: #000000;
  line-height: 1.8;
  margin: 0;
  font-size: 1.05rem;
}

/* Achievements Section - Fix text visibility */
#milestones .about-section-card {
  background: rgba(0, 0, 0, 0.7);
  border: 1px solid rgba(0, 245, 255, 0.3);
}

#milestones .about-section-card h3 {
  color: var(--primary-color) !important;
  margin-bottom: 15px;
}

#milestones .about-section-card ul {
  color: var(--text-light) !important;
  list-style: none;
  padding-left: 20px;
}

#milestones .about-section-card li {
  color: var(--text-light) !important;
  margin-bottom: 8px;
  line-height: 1.6;
  position: relative;
}

#milestones .about-section-card li::before {
  content: '•';
  color: var(--primary-color);
  position: absolute;
  left: -15px;
}

.focus-areas {
  background: var(--bg-card);
  border: 1px solid rgba(0, 245, 255, 0.3);
  border-radius: 15px;
  padding: 30px;
  backdrop-filter: blur(10px);
}

.focus-areas h3 {
  color: var(--primary-color);
  margin-bottom: 20px;
  font-size: 1.5rem;
}

.focus-areas ul {
  list-style: none;
  padding: 0;
}

.focus-areas li {
  color: var(--text-muted);
  margin-bottom: 10px;
  padding-left: 20px;
  position: relative;
}

.focus-areas li::before {
  content: '•';
  color: var(--primary-color);
  position: absolute;
  left: -5px;
}

/* Modern Professional Design Styles */
.modern-section {
  background: linear-gradient(135deg, rgba(10, 10, 40, 0.3) 0%, rgba(0, 0, 0, 0.2) 100%);
  position: relative;
}

.professional-section {
  background: linear-gradient(135deg, rgba(0, 20, 40, 0.4) 0%, rgba(10, 10, 40, 0.3) 100%);
}

.achievements-section {
  background: linear-gradient(135deg, rgba(0, 0, 0, 0.3) 0%, rgba(20, 0, 40, 0.3) 100%);
}

.section-header {
  text-align: center;
  margin-bottom: 60px;
}

.section-header .section-title {
  position: relative;
  display: inline-block;
  margin-bottom: 20px;
}

.title-underline {
  width: 80px;
  height: 4px;
  background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
  margin: 0 auto 15px;
  border-radius: 2px;
}

.section-subtitle {
  color: var(--text-muted);
  font-size: 1.2rem;
  font-style: italic;
}

.glass-card {
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(0, 245, 255, 0.2);
  border-radius: 20px;
  padding: 30px;
  transition: all 0.3s ease;
  color: var(--text-dark);
}

.glass-card h3,
.glass-card h4,
.glass-card p,
.glass-card span {
  color: var(--text-dark);
}

.glass-card .card-header h3 {
  color: var(--text-dark);
  margin: 0;
}

.glass-card .intro-text {
  color: var(--text-dark);
}

.glass-card:hover {
  transform: translateY(-5px);
  border-color: var(--primary-color);
  box-shadow: 0 20px 40px rgba(0, 245, 255, 0.1);
}

/* About Me Styles */
.about-content-wrapper {
  max-width: 1200px;
  margin: 0 auto;
}

.hero-intro {
  margin-bottom: 50px;
}

.intro-card {
  text-align: center;
  max-width: 800px;
  margin: 0 auto;
}

.profile-highlight {
  display: flex;
  align-items: center;
  gap: 30px;
  text-align: left;
}

.highlight-icon {
  width: 80px;
  height: 80px;
  background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2rem;
  color: white;
  flex-shrink: 0;
}

.highlight-content h3 {
  color: var(--primary-color);
  font-size: 2.2rem;
  margin-bottom: 10px;
}

.role-badge {
  background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
  color: white;
  padding: 8px 20px;
  border-radius: 25px;
  font-size: 0.9rem;
  font-weight: 600;
  display: inline-block;
  margin-bottom: 20px;
}

.intro-text {
  color: var(--text-light);
  font-size: 1.1rem;
  line-height: 1.8;
}

.about-main-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
  margin-bottom: 50px;
}

.content-column {
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.timeline-card .card-header {
  display: flex;
  align-items: center;
  gap: 15px;
  margin-bottom: 20px;
}

.timeline-card .card-header i {
  color: var(--primary-color);
  font-size: 1.8rem;
}

.timeline-card .card-header h3 {
  color: var(--primary-color);
  margin: 0;
}

.card-content {
  color: var(--text-light);
  line-height: 1.7;
}

.achievement-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 20px;
}

.tag {
  background: rgba(0, 245, 255, 0.2);
  color: var(--primary-color);
  padding: 6px 15px;
  border-radius: 20px;
  font-size: 0.85rem;
  border: 1px solid var(--primary-color);
}

.vision-stats {
  display: flex;
  gap: 30px;
  margin-top: 25px;
}

.stat-item {
  text-align: center;
}

.stat-number {
  display: block;
  font-size: 1.8rem;
  font-weight: 700;
  color: var(--primary-color);
}

.stat-label {
  font-size: 0.9rem;
  color: var(--text-muted);
  text-transform: uppercase;
  letter-spacing: 1px;
}

.brand-showcase {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 20px;
}

.brand-item {
  background: rgba(123, 104, 238, 0.2);
  color: var(--accent-color);
  padding: 6px 12px;
  border-radius: 15px;
  font-size: 0.85rem;
  font-weight: 600;
}

.impact-metrics {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
  margin-top: 20px;
}

.metric {
  display: flex;
  align-items: center;
  gap: 8px;
  background: rgba(255, 255, 255, 0.95);
  padding: 10px 15px;
  border-radius: 25px;
  color: var(--text-dark);
}

.metric i {
  color: var(--primary-color);
}

.philosophy-section {
  margin-top: 40px;
}

.philosophy-card {
  max-width: 1000px;
  margin: 0 auto;
}

.philosophy-content {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
}

/* Professional Background Styles */
.professional-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 30px;
  margin-bottom: 50px;
}

.professional-card {
  position: relative;
  overflow: hidden;
}

.professional-card.featured {
  background: linear-gradient(135deg, rgba(0, 245, 255, 0.1) 0%, rgba(123, 104, 238, 0.1) 100%);
  border: 2px solid var(--primary-color);
}

.card-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
}

.professional-card .card-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 20px;
}

.header-icon {
  width: 60px;
  height: 60px;
  background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
  border-radius: 15px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.5rem;
  color: white;
}

.header-text h3 {
  color: var(--primary-color);
  margin: 0;
  font-size: 1.4rem;
}

.card-badge, .location-badge, .growth-badge, .stack-badge {
  padding: 4px 12px;
  border-radius: 20px;
  font-size: 0.8rem;
  font-weight: 600;
}

.card-badge {
  background: var(--primary-color);
  color: var(--bg-dark);
}

.location-badge {
  background: rgba(123, 104, 238, 0.8);
  color: white;
}

.growth-badge {
  background: rgba(40, 167, 69, 0.8);
  color: white;
}

.stack-badge {
  background: rgba(255, 193, 7, 0.8);
  color: var(--bg-dark);
}

.skill-highlights {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
  margin-top: 20px;
}

.skill-item {
  display: flex;
  align-items: center;
  gap: 8px;
  background: rgba(0, 245, 255, 0.1);
  padding: 8px 15px;
  border-radius: 20px;
  color: var(--primary-color);
  font-size: 0.9rem;
}

.experience-timeline {
  margin-top: 20px;
}

.timeline-item {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 10px;
}

.timeline-marker {
  width: 8px;
  height: 8px;
  background: var(--primary-color);
  border-radius: 50%;
}

.metrics-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 15px;
  margin-top: 20px;
}

.metric-item {
  text-align: center;
  background: rgba(255, 255, 255, 0.95);
  padding: 15px 10px;
  border-radius: 15px;
  color: var(--text-dark);
}

.metric-value {
  display: block;
  font-size: 1.3rem;
  font-weight: 700;
  color: var(--primary-color);
}

.metric-label {
  font-size: 0.8rem;
  color: var(--text-muted);
  text-transform: uppercase;
  letter-spacing: 1px;
}

.tech-categories {
  margin-top: 20px;
}

.tech-category {
  margin-bottom: 15px;
}

.tech-category h4 {
  color: var(--primary-color);
  font-size: 0.9rem;
  margin-bottom: 8px;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.tech-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
}

.tech-tags span {
  background: rgba(123, 104, 238, 0.2);
  color: var(--accent-color);
  padding: 4px 10px;
  border-radius: 12px;
  font-size: 0.8rem;
}

.competencies-section {
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(10px);
  border-radius: 20px;
  padding: 40px;
  border: 1px solid rgba(0, 245, 255, 0.2);
}

.competencies-title {
  text-align: center;
  color: var(--primary-color);
  margin-bottom: 30px;
  font-size: 1.8rem;
}

.competencies-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 20px;
}

.competency-item {
  display: flex;
  align-items: center;
  gap: 12px;
  background: rgba(255, 255, 255, 0.95);
  padding: 15px 20px;
  border-radius: 15px;
  transition: all 0.3s ease;
  color: var(--text-dark);
}

.competency-item:hover {
  transform: translateY(-2px);
  background: rgba(0, 245, 255, 0.1);
  color: var(--primary-color);
}

.competency-item i {
  color: var(--primary-color);
  font-size: 1.2rem;
}

/* Achievements Section Styles */
.achievements-showcase {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 40px;
}

.achievement-category {
  position: relative;
}

.category-header {
  display: flex;
  align-items: center;
  margin-bottom: 30px;
  position: relative;
}

.category-icon {
  width: 60px;
  height: 60px;
  background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.5rem;
  color: white;
  margin-right: 20px;
}

.category-header h3 {
  color: var(--primary-color);
  font-size: 1.6rem;
  margin: 0;
}

.category-line {
  flex: 1;
  height: 2px;
  background: linear-gradient(90deg, var(--primary-color), transparent);
  margin-left: 20px;
}

.achievements-list {
  position: relative;
  padding-left: 20px;
}

.achievements-list::before {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  width: 2px;
  background: linear-gradient(180deg, var(--primary-color), var(--accent-color));
}

.achievement-item {
  position: relative;
  margin-bottom: 25px;
  display: flex;
  align-items: flex-start;
  gap: 20px;
}

.achievement-marker {
  width: 12px;
  height: 12px;
  background: var(--primary-color);
  border-radius: 50%;
  margin-left: -26px;
  margin-top: 8px;
  border: 3px solid var(--bg-dark);
  z-index: 2;
  flex-shrink: 0;
}

.achievement-content {
  flex: 1;
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(10px);
  padding: 20px;
  border-radius: 15px;
  border: 1px solid rgba(0, 245, 255, 0.2);
  transition: all 0.3s ease;
}

.achievement-content:hover {
  border-color: var(--primary-color);
  transform: translateX(5px);
  box-shadow: 0 10px 30px rgba(0, 245, 255, 0.1);
}

.achievement-content h4 {
  color: var(--primary-color);
  margin: 0 0 10px;
  font-size: 1.2rem;
}

.achievement-content p {
  color: var(--text-dark);
  margin: 0;
  line-height: 1.6;
}

.achievement-period {
  background: var(--primary-color);
  color: var(--bg-dark);
  padding: 2px 8px;
  border-radius: 10px;
  font-size: 0.8rem;
  font-weight: 600;
  display: inline-block;
  margin-top: 10px;
}

.featured-achievement .achievement-content {
  background: linear-gradient(135deg, rgba(0, 245, 255, 0.1) 0%, rgba(123, 104, 238, 0.1) 100%);
  border: 2px solid var(--primary-color);
}

.achievement-stats {
  display: flex;
  gap: 15px;
  margin-top: 15px;
}

.achievement-stats .stat {
  background: rgba(0, 245, 255, 0.2);
  color: var(--primary-color);
  padding: 5px 12px;
  border-radius: 15px;
  font-size: 0.85rem;
  font-weight: 600;
}

/* Responsive Design */
@media (max-width: 768px) {
  .about-main-grid, .philosophy-content, .professional-grid {
    grid-template-columns: 1fr;
    gap: 20px;
  }
  
  .profile-highlight {
    flex-direction: column;
    text-align: center;
  }
  
  .vision-stats {
    justify-content: center;
  }
  
  .achievements-showcase {
    grid-template-columns: 1fr;
  }
  
  .competencies-grid {
    grid-template-columns: 1fr;
  }
  
  .metrics-grid {
    grid-template-columns: 1fr;
  }
}

.focus-areas li::before {
  content: '•';
  color: var(--accent-color);
  position: absolute;
  left: 0;
  font-size: 1.5rem;
}

/* Skills Section */
.skills-section {
  padding: 100px 20px;
  background: rgba(0, 0, 0, 0.1);
}

.skills-container {
  max-width: 1200px;
  margin: 0 auto;
}

.skills-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
  margin-top: 50px;
}

.skill-category {
  background: var(--bg-card);
  border: 1px solid rgba(0, 245, 255, 0.3);
  border-radius: 15px;
  padding: 30px;
  backdrop-filter: blur(10px);
}

.skill-category h3 {
  color: var(--primary-color);
  margin-bottom: 25px;
  font-size: 1.3rem;
  text-align: center;
}

.skill-item {
  margin-bottom: 20px;
}

.skill-name {
  display: flex;
  justify-content: space-between;
  color: var(--text-light);
  margin-bottom: 8px;
  font-weight: 600;
}

.skill-bar {
  background: rgba(255, 255, 255, 0.1);
  border-radius: 10px;
  height: 8px;
  overflow: hidden;
}

.skill-progress {
  height: 100%;
  background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
  border-radius: 10px;
  animation: skillLoad 2s ease-in-out;
}

@keyframes skillLoad {
  0% { width: 0%; }
}

/* Featured Videos Section */
.featured-videos-section {
  padding: 100px 0;
  background: linear-gradient(135deg, rgba(0, 245, 255, 0.05) 0%, rgba(123, 104, 238, 0.05) 100%);
  position: relative;
  overflow: hidden;
}

.videos-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

.videos-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 40px;
  margin-top: 60px;
}

.video-card {
  background: rgba(255, 255, 255, 0.95);
  border-radius: 20px;
  overflow: hidden;
  transition: all 0.3s ease;
  border: 1px solid rgba(0, 245, 255, 0.2);
  color: var(--text-dark);
}

.video-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 30px 60px rgba(0, 245, 255, 0.2);
  border-color: var(--primary-color);
}

.video-thumbnail {
  position: relative;
  width: 100%;
  height: 220px;
  overflow: hidden;
}

.video-thumbnail iframe {
  width: 100%;
  height: 100%;
  border: none;
}

.video-content {
  padding: 25px;
}

.video-title {
  font-size: 1.3rem;
  font-weight: 700;
  color: var(--text-dark);
  margin-bottom: 15px;
  line-height: 1.4;
}

.video-description {
  color: var(--text-dark);
  opacity: 0.8;
  line-height: 1.6;
  margin-bottom: 20px;
}

.video-meta {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-top: 15px;
  border-top: 1px solid rgba(0, 245, 255, 0.1);
}

.video-platform {
  background: #FF0000;
  color: white;
  padding: 5px 12px;
  border-radius: 15px;
  font-size: 0.8rem;
  font-weight: 600;
  display: flex;
  align-items: center;
  gap: 5px;
}

.video-date {
  color: var(--text-muted);
  font-size: 0.9rem;
}

.featured-badge {
  position: absolute;
  top: 15px;
  right: 15px;
  background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
  color: white;
  padding: 5px 12px;
  border-radius: 15px;
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  z-index: 2;
}

/* ScienThush Content Section */
.scienthush-section {
  padding: 100px 0;
  background: linear-gradient(135deg, rgba(123, 104, 238, 0.08) 0%, rgba(0, 245, 255, 0.08) 100%);
  position: relative;
  overflow: hidden;
}

.scienthush-container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 20px;
}

.platform-tabs {
  display: flex;
  justify-content: center;
  gap: 20px;
  margin: 40px 0;
}

.platform-tab {
  background: rgba(255, 255, 255, 0.95);
  border: 2px solid transparent;
  padding: 15px 30px;
  border-radius: 30px;
  cursor: pointer;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  gap: 10px;
  font-weight: 600;
  color: var(--text-dark);
}

.platform-tab.active {
  border-color: var(--primary-color);
  background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
  color: white;
}

.platform-tab:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 25px rgba(0, 245, 255, 0.2);
}

.platform-tab i {
  font-size: 1.2rem;
}

.platform-tab .facebook-icon {
  color: #1877f2;
}

.platform-tab .youtube-icon {
  color: #ff0000;
}

.platform-tab.active .facebook-icon,
.platform-tab.active .youtube-icon {
  color: white;
}

.content-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
  gap: 30px;
  margin-top: 50px;
}

.content-card {
  background: rgba(255, 255, 255, 0.95);
  border-radius: 20px;
  overflow: hidden;
  transition: all 0.3s ease;
  border: 1px solid rgba(0, 245, 255, 0.2);
  color: var(--text-dark);
  position: relative;
}

.content-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 25px 50px rgba(0, 245, 255, 0.2);
  border-color: var(--primary-color);
}

.content-thumbnail {
  position: relative;
  width: 100%;
  height: 240px;
  overflow: hidden;
  background: #f8f9fa;
}

.content-thumbnail img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.content-thumbnail iframe {
  width: 100%;
  height: 100%;
  border: none;
  transition: transform 0.3s ease;
}

.content-card:hover .content-thumbnail img,
.content-card:hover .content-thumbnail iframe {
  transform: scale(1.02);
}

.viral-badge {
  position: absolute;
  top: 15px;
  left: 15px;
  background: linear-gradient(45deg, #ff6b35, #f7931e);
  color: white;
  padding: 5px 12px;
  border-radius: 15px;
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  z-index: 2;
}

.trending-badge {
  position: absolute;
  top: 15px;
  left: 15px;
  background: linear-gradient(45deg, #ff0080, #ff6b35);
  color: white;
  padding: 5px 12px;
  border-radius: 15px;
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  z-index: 2;
}

.platform-badge {
  position: absolute;
  top: 15px;
  right: 15px;
  padding: 5px 12px;
  border-radius: 15px;
  font-size: 0.75rem;
  font-weight: 600;
  display: flex;
  align-items: center;
  gap: 5px;
  z-index: 2;
}

.facebook-badge {
  background: #1877f2;
  color: white;
}

.youtube-badge {
  background: #ff0000;
  color: white;
}

.content-info {
  padding: 25px;
}

.content-title {
  font-size: 1.3rem;
  font-weight: 700;
  color: var(--text-dark);
  margin-bottom: 12px;
  line-height: 1.4;
}

.content-description {
  color: var(--text-dark);
  opacity: 0.8;
  line-height: 1.6;
  margin-bottom: 25px;
}

.content-link {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
  color: white;
  padding: 12px 20px;
  border-radius: 25px;
  text-decoration: none;
  font-size: 0.9rem;
  font-weight: 600;
  transition: all 0.3s ease;
}

.content-link:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(0, 245, 255, 0.3);
  text-decoration: none;
  color: white;
}

.platform-header {
  text-align: center;
  margin: 40px 0;
  padding: 30px;
  background: rgba(255, 255, 255, 0.95);
  border-radius: 20px;
  border: 1px solid rgba(0, 245, 255, 0.2);
}

.platform-logo {
  font-size: 3rem;
  margin-bottom: 15px;
}

.platform-info h3 {
  color: var(--text-dark);
  font-size: 1.8rem;
  margin-bottom: 10px;
}

.platform-info p {
  color: var(--text-dark);
  opacity: 0.8;
  font-size: 1.1rem;
}

.follow-stats {
  display: flex;
  justify-content: center;
  gap: 30px;
  margin-top: 20px;
}

.follow-stat {
  text-align: center;
}

.follow-stat .number {
  display: block;
  font-size: 1.8rem;
  font-weight: 700;
  color: var(--primary-color);
}

.follow-stat .label {
  font-size: 0.9rem;
  color: var(--text-dark);
  opacity: 0.7;
  text-transform: uppercase;
  letter-spacing: 1px;
}

/* Projects Section */
.projects-section {
  padding: 100px 20px;
  background: rgba(0, 0, 0, 0.3);
}

.projects-container {
  max-width: 1200px;
  margin: 0 auto;
}

.projects-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 30px;
  margin-top: 50px;
}

.project-card {
  background: var(--bg-card);
  border: 1px solid rgba(0, 245, 255, 0.3);
  border-radius: 15px;
  padding: 30px;
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.project-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
  transform: scaleX(0);
  transition: transform 0.3s ease;
}

.project-card:hover::before {
  transform: scaleX(1);
}

.project-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0, 245, 255, 0.2);
}

.project-card h3 {
  color: var(--text-light);
  margin-bottom: 15px;
  font-size: 1.3rem;
}

.project-card p {
  color: var(--text-muted);
  line-height: 1.6;
  margin-bottom: 20px;
}

.project-links a {
  display: inline-block;
  padding: 8px 16px;
  margin-right: 10px;
  background: transparent;
  border: 1px solid var(--primary-color);
  color: var(--primary-color);
  text-decoration: none;
  border-radius: 5px;
  transition: all 0.3s ease;
}

.project-links a:hover {
  background: var(--primary-color);
  color: var(--bg-dark);
}

/* Contact Section */
.contact-section {
  padding: 100px 20px;
  background: rgba(0, 0, 0, 0.5);
}

.contact-container {
  max-width: 1200px;
  margin: 0 auto;
}

.contact-content {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 50px;
  margin-bottom: 50px;
}

.contact-info h3,
.contact-form h3 {
  color: var(--primary-color);
  margin-bottom: 20px;
  font-size: 1.5rem;
}

.contact-info p {
  color: var(--text-muted);
  font-size: 1.1rem;
  margin-bottom: 30px;
  line-height: 1.6;
}

.contact-details {
  margin-bottom: 30px;
}

.contact-item {
  display: flex;
  align-items: center;
  gap: 15px;
  margin-bottom: 20px;
  padding: 15px;
  background: var(--bg-card);
  border-radius: 10px;
  border: 1px solid rgba(0, 245, 255, 0.2);
  backdrop-filter: blur(10px);
}

.contact-item i {
  color: var(--primary-color);
  font-size: 1.2rem;
  width: 20px;
  text-align: center;
}

.contact-item h4 {
  color: var(--text-light);
  margin: 0 0 5px 0;
  font-size: 1rem;
}

.contact-item p {
  color: var(--text-muted);
  margin: 0;
  font-size: 0.9rem;
}

.social-links {
  display: flex;
  gap: 15px;
  margin-bottom: 30px;
}

.social-link {
  width: 50px;
  height: 50px;
  background: var(--bg-card);
  border: 1px solid rgba(0, 245, 255, 0.3);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--primary-color);
  text-decoration: none;
  transition: all 0.3s ease;
  backdrop-filter: blur(10px);
}

.social-link:hover {
  background: var(--primary-color);
  color: var(--bg-dark);
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0, 245, 255, 0.3);
}

.contact-form {
  background: var(--bg-card);
  border: 1px solid rgba(0, 245, 255, 0.3);
  border-radius: 15px;
  padding: 30px;
  backdrop-filter: blur(10px);
}

.form-group {
  position: relative;
  margin-bottom: 25px;
}

.form-group input,
.form-group textarea {
  width: 100%;
  padding: 15px;
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(0, 245, 255, 0.3);
  border-radius: 8px;
  color: var(--text-light);
  font-size: 1rem;
  transition: all 0.3s ease;
  backdrop-filter: blur(10px);
}

.form-group input:focus,
.form-group textarea:focus {
  outline: none;
  border-color: var(--primary-color);
  box-shadow: 0 0 10px rgba(0, 245, 255, 0.3);
}

.form-group label {
  position: absolute;
  top: 15px;
  left: 15px;
  color: var(--text-muted);
  font-size: 1rem;
  transition: all 0.3s ease;
  pointer-events: none;
}

.form-group input:focus + label,
.form-group textarea:focus + label,
.form-group input:valid + label,
.form-group textarea:valid + label {
  top: -10px;
  left: 10px;
  font-size: 0.8rem;
  color: var(--primary-color);
  background: var(--bg-dark);
  padding: 0 5px;
}

.submit-btn {
  width: 100%;
  padding: 15px;
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
  color: var(--bg-dark);
  border: none;
  border-radius: 50px;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
}

.submit-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 20px rgba(0, 245, 255, 0.3);
}

.quick-links {
  display: flex;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
}

.contact-link {
  display: inline-block;
  padding: 15px 30px;
  background: transparent;
  border: 2px solid var(--primary-color);
  color: var(--primary-color);
  text-decoration: none;
  border-radius: 50px;
  transition: all 0.3s ease;
  font-weight: 600;
}

.contact-link:hover {
  background: var(--primary-color);
  color: var(--bg-dark);
  box-shadow: 0 0 20px var(--primary-color);
}

/* Gallery Section */
.gallery-section {
  padding: 100px 20px;
  background: rgba(0, 0, 0, 0.2);
}

.gallery-container {
  max-width: 1200px;
  margin: 0 auto;
}

.gallery-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 20px;
  margin-top: 50px;
}

.gallery-item {
  position: relative;
  aspect-ratio: 1;
  border-radius: 15px;
  overflow: hidden;
  background: var(--bg-card);
  border: 1px solid rgba(0, 245, 255, 0.3);
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
}

.gallery-item:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0, 245, 255, 0.3);
}

.gallery-item img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.gallery-item:hover img {
  transform: scale(1.1);
}

.gallery-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
  color: var(--text-light);
  padding: 20px;
  transform: translateY(100%);
  transition: transform 0.3s ease;
}

.gallery-item:hover .gallery-overlay {
  transform: translateY(0);
}

.gallery-overlay h4 {
  font-size: 1.2rem;
  margin-bottom: 5px;
  color: var(--primary-color);
}

.gallery-overlay p {
  font-size: 0.9rem;
  color: var(--text-muted);
}

/* Responsive Design */
@media (max-width: 768px) {
  .hero-content {
    grid-template-columns: 1fr;
    text-align: center;
  }
  
  .hero-text h1 {
    font-size: 2.5rem;
  }
  
  .profile-container {
    width: 250px;
    height: 320px;
  }
  
  .about-grid {
    grid-template-columns: 1fr;
  }
  
  .about-section-card {
    padding: 20px;
  }
  
  .about-section-card h3 {
    font-size: 1.2rem;
  }
  
  .skills-grid {
    grid-template-columns: 1fr;
  }
  
  .projects-grid {
    grid-template-columns: 1fr;
  }
  
  .gallery-grid {
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  }
  
  .contact-content {
    grid-template-columns: 1fr;
    gap: 30px;
  }
  
  .quick-links {
    flex-direction: column;
    align-items: center;
  }
}
</style>
@endpush

<!-- Particle Background -->
<div class="particles-container" id="particles"></div>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <div class="hero-text">
            <h1>Atique Enam</h1>
            <p class="subtitle">ScienThush | AI Researcher | Content Creator</p>
            <p class="description">
                Hey there, I am Atique Enam - Final-year Computer Science & Engineering student at 
                Daffodil International University, specializing in Artificial Intelligence, Machine Learning, 
                and Educational Data Science, alongside being an active social media content creator with 470K+ followers on Facebook.
            </p>
            <p class="description" style="margin-bottom: 20px; color: var(--accent-color); font-style: italic;">
                "Bridging the gap between cutting-edge AI research and accessible digital content creation, 
                I strive to make technology both innovative and relatable to global audiences."
            </p>
            <div class="stats-section" style="display: flex; gap: 30px; margin-bottom: 30px; flex-wrap: wrap;">
                <div style="text-align: center;">
                    <div style="font-size: 2rem; font-weight: bold; color: var(--primary-color);">470K+</div>
                    <div style="color: var(--text-muted); font-size: 0.9rem;">Social Followers</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 2rem; font-weight: bold; color: var(--secondary-color);">5+</div>
                    <div style="color: var(--text-muted); font-size: 0.9rem;">Years Experience</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 2rem; font-weight: bold; color: var(--accent-color);">10+</div>
                    <div style="color: var(--text-muted); font-size: 0.9rem;">Brand Partnerships</div>
                </div>
            </div>
            <div class="contact-links" style="justify-content: flex-start;">
                <a href="https://facebook.com/scienthush" target="_blank" class="contact-link">
                    <i class="fab fa-facebook-f"></i> Facebook
                </a>
                <a href="mailto:scienthush.official@gmail.com" class="contact-link">
                    <i class="fas fa-envelope"></i> Email
                </a>
                <a href="https://drive.google.com/file/d/1QsPT1fN8jUIDQ75xaEBJ5Z3xLU_gOmU0/view" target="_blank" class="contact-link">
                    <i class="fas fa-file-alt"></i> View CV
                </a>
            </div>
        </div>
        
        <div class="hero-image">
            <div class="profile-container">
                <div class="profile-inner">
                    <img src="assets/images/atq4.png" alt="Atique Enam">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Me Section - Redesigned -->
<section id="about" class="about-section modern-section">
    <div class="about-container">
        <div class="section-header">
            <h2 class="section-title">About Me</h2>
            <div class="title-underline"></div>
            <p class="section-subtitle">Bridging Technology and Creativity</p>
        </div>
        
        <div class="about-content-wrapper">
            <!-- Hero Introduction -->
            <div class="hero-intro">
                <div class="intro-card glass-card">
                    <div class="profile-highlight">
                        <div class="highlight-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="highlight-content">
                            <h3>Md Atique Enam</h3>
                            <p class="role-badge">AI Researcher & Content Creator</p>
                            <p class="intro-text">
                                Computer Science & Engineering student at Daffodil International University, specializing in 
                                Artificial Intelligence, Machine Learning, and Educational Data Science. Also known as 
                                <strong>ScienThush</strong> in the digital world.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="about-main-grid">
                <!-- Left Column - Journey & Research -->
                <div class="content-column">
                    <div class="timeline-card glass-card">
                        <div class="card-header">
                            <i class="fas fa-microscope"></i>
                            <h3>Research Excellence</h3>
                        </div>
                        <div class="card-content">
                            <p>
                                Contributing to cutting-edge research in explainable AI, educational data mining, and 
                                precision medicine. My work focuses on making machine learning techniques more transparent 
                                and actionable, with recognition through multiple scholarships and selection for international 
                                academic exchange programs in Japan and India.
                            </p>
                            <div class="achievement-tags">
                                <span class="tag">Explainable AI</span>
                                <span class="tag">Educational Data Mining</span>
                                <span class="tag">Precision Medicine</span>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-card glass-card">
                        <div class="card-header">
                            <i class="fas fa-lightbulb"></i>
                            <h3>Creative Vision</h3>
                        </div>
                        <div class="card-content">
                            <p>
                                My creative philosophy centers on storytelling that bridges technical complexity with 
                                human understanding. Through relatable characters and compelling narratives, I transform 
                                complex AI concepts into accessible content that resonates with diverse audiences.
                            </p>
                            <div class="vision-stats">
                                <div class="stat-item">
                                    <span class="stat-number">470K+</span>
                                    <span class="stat-label">Followers</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number">Millions</span>
                                    <span class="stat-label">Views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Digital Impact & Recognition -->
                <div class="content-column">
                    <div class="timeline-card glass-card">
                        <div class="card-header">
                            <i class="fas fa-video"></i>
                            <h3>Digital Innovation</h3>
                        </div>
                        <div class="card-content">
                            <p>
                                Since 2019, I've built a powerful digital presence as ScienThush, creating socially impactful 
                                content that blends storytelling, comedy, and social awareness. My collaborations with major 
                                brands like Nagad, Bkash, Realme, Oppo, and Suzuki demonstrate the commercial value of 
                                authentic creative content.
                            </p>
                            <div class="brand-showcase">
                                <div class="brand-item">Nagad</div>
                                <div class="brand-item">Bkash</div>
                                <div class="brand-item">Realme</div>
                                <div class="brand-item">Oppo</div>
                                <div class="brand-item">Suzuki</div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-card glass-card">
                        <div class="card-header">
                            <i class="fas fa-globe"></i>
                            <h3>Global Impact</h3>
                        </div>
                        <div class="card-content">
                            <p>
                                Featured in various media outlets, my work demonstrates the power of combining technical 
                                expertise with creative storytelling. I've created meaningful impact in both academic 
                                and social media spheres, inspiring the next generation of tech enthusiasts.
                            </p>
                            <div class="impact-metrics">
                                <div class="metric">
                                    <i class="fas fa-award"></i>
                                    <span>Multiple Awards</span>
                                </div>
                                <div class="metric">
                                    <i class="fas fa-plane"></i>
                                    <span>International Programs</span>
                                </div>
                                <div class="metric">
                                    <i class="fas fa-handshake"></i>
                                    <span>Brand Partnerships</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Philosophy & Future Section -->
            <div class="philosophy-section">
                <div class="philosophy-card glass-card">
                    <div class="philosophy-content">
                        <div class="philosophy-left">
                            <div class="card-header">
                                <i class="fas fa-handshake"></i>
                                <h3>Professional Philosophy</h3>
                            </div>
                            <p>
                                I believe in the convergence of technology and humanity. My approach combines rigorous 
                                technical research with accessible communication, making complex AI concepts understandable 
                                to broader audiences while maintaining ethical responsibility.
                            </p>
                        </div>
                        <div class="philosophy-right">
                            <div class="card-header">
                                <i class="fas fa-rocket"></i>
                                <h3>Future Vision</h3>
                            </div>
                            <p>
                                Establishing myself as a leading researcher in explainable AI while expanding content 
                                creation platforms globally. Working towards breakthrough contributions in educational 
                                data science and precision medicine.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Professional Background Section - Redesigned -->
<section id="background" class="about-section professional-section">
    <div class="about-container">
        <div class="section-header">
            <h2 class="section-title">Professional Background</h2>
            <div class="title-underline"></div>
            <p class="section-subtitle">Excellence Through Innovation</p>
        </div>

        <div class="professional-grid">
            <!-- Academic Excellence Card -->
            <div class="professional-card glass-card featured">
                <div class="card-overlay"></div>
                <div class="card-header">
                    <div class="header-icon">
                        <i class="fas fa-university"></i>
                    </div>
                    <div class="header-text">
                        <h3>Academic Excellence</h3>
                        <span class="card-badge">Current</span>
                    </div>
                </div>
                <div class="card-content">
                    <p>
                        Pursuing Computer Science & Engineering at Daffodil International University with specialized 
                        focus on AI and Machine Learning. Maintaining outstanding performance with multiple merit-based 
                        scholarships and consistent top rankings.
                    </p>
                    <div class="skill-highlights">
                        <div class="skill-item">
                            <i class="fas fa-brain"></i>
                            <span>Artificial Intelligence</span>
                        </div>
                        <div class="skill-item">
                            <i class="fas fa-chart-line"></i>
                            <span>Machine Learning</span>
                        </div>
                        <div class="skill-item">
                            <i class="fas fa-code"></i>
                            <span>Software Engineering</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- International Experience Card -->
            <div class="professional-card glass-card">
                <div class="card-header">
                    <div class="header-icon">
                        <i class="fas fa-plane"></i>
                    </div>
                    <div class="header-text">
                        <h3>Global Exposure</h3>
                        <span class="location-badge">Japan & India</span>
                    </div>
                </div>
                <div class="card-content">
                    <p>
                        Selected for prestigious international academic exchange programs, representing my university 
                        and country. Gained invaluable exposure to global academic standards and cross-cultural 
                        collaboration methodologies.
                    </p>
                    <div class="experience-timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <span>Japan Exchange Program</span>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <span>India Academic Program</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Creation Metrics Card -->
            <div class="professional-card glass-card">
                <div class="card-header">
                    <div class="header-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="header-text">
                        <h3>Digital Impact</h3>
                        <span class="growth-badge">+470K</span>
                    </div>
                </div>
                <div class="card-content">
                    <p>
                        Built substantial digital presence with exceptional engagement rates. Successful brand 
                        partnerships have resulted in measurable impact for major companies across various industries.
                    </p>
                    <div class="metrics-grid">
                        <div class="metric-item">
                            <span class="metric-value">470K+</span>
                            <span class="metric-label">Followers</span>
                        </div>
                        <div class="metric-item">
                            <span class="metric-value">Millions</span>
                            <span class="metric-label">Views</span>
                        </div>
                        <div class="metric-item">
                            <span class="metric-value">High</span>
                            <span class="metric-label">Engagement</span>
                        </div>
                        <div class="metric-item">
                            <span class="metric-value">Viral</span>
                            <span class="metric-label">Content</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Technical Expertise Card -->
            <div class="professional-card glass-card">
                <div class="card-header">
                    <div class="header-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <div class="header-text">
                        <h3>Technical Stack</h3>
                        <span class="stack-badge">Full-Stack</span>
                    </div>
                </div>
                <div class="card-content">
                    <p>
                        Proficient across multiple technologies and frameworks. Strong foundation in both theoretical 
                        concepts and practical implementation across web development and machine learning domains.
                    </p>
                    <div class="tech-categories">
                        <div class="tech-category">
                            <h4>Programming</h4>
                            <div class="tech-tags">
                                <span>Python</span>
                                <span>Java</span>
                                <span>JavaScript</span>
                            </div>
                        </div>
                        <div class="tech-category">
                            <h4>ML/AI</h4>
                            <div class="tech-tags">
                                <span>TensorFlow</span>
                                <span>PyTorch</span>
                                <span>Scikit-learn</span>
                            </div>
                        </div>
                        <div class="tech-category">
                            <h4>Web Dev</h4>
                            <div class="tech-tags">
                                <span>Laravel</span>
                                <span>Vue.js</span>
                                <span>MySQL</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Core Competencies Section -->
        <div class="competencies-section">
            <h3 class="competencies-title">Core Competencies</h3>
            <div class="competencies-grid">
                <div class="competency-item">
                    <i class="fas fa-code"></i>
                    <span>Full-Stack Development</span>
                </div>
                <div class="competency-item">
                    <i class="fas fa-database"></i>
                    <span>Data Science & Analytics</span>
                </div>
                <div class="competency-item">
                    <i class="fas fa-robot"></i>
                    <span>Machine Learning</span>
                </div>
                <div class="competency-item">
                    <i class="fas fa-video"></i>
                    <span>Video Production</span>
                </div>
                <div class="competency-item">
                    <i class="fas fa-pen"></i>
                    <span>Content Strategy</span>
                </div>
                <div class="competency-item">
                    <i class="fas fa-users"></i>
                    <span>Team Leadership</span>
                </div>
                <div class="competency-item">
                    <i class="fas fa-presentation"></i>
                    <span>Public Speaking</span>
                </div>
                <div class="competency-item">
                    <i class="fas fa-handshake"></i>
                    <span>Brand Collaboration</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Achievements & Milestones Section - Redesigned -->
<section id="milestones" class="about-section achievements-section">
    <div class="about-container">
        <div class="section-header">
            <h2 class="section-title">Achievements & Milestones</h2>
            <div class="title-underline"></div>
            <p class="section-subtitle">Celebrating Success & Impact</p>
        </div>

        <div class="achievements-showcase">
            <!-- Educational Background -->
            <div class="achievement-category">
                <div class="category-header">
                    <div class="category-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Educational Background</h3>
                    <div class="category-line"></div>
                </div>
                <div class="achievements-list">
                    <div class="achievement-item">
                        <div class="achievement-marker"></div>
                        <div class="achievement-content">
                            <h4>Bachelor of Science in Computer Science & Engineering</h4>
                            <p>Currently studying at Daffodil International University</p>
                            <span class="achievement-period">2021-Present</span>
                        </div>
                    </div>
                    <div class="achievement-item">
                        <div class="achievement-marker"></div>
                        <div class="achievement-content">
                            <h4>Higher Secondary Certificate (HSC)</h4>
                            <p>Gazipur Cantonment College - GPA 5.00</p>
                            <span class="achievement-period">2020</span>
                        </div>
                    </div>
                    <div class="achievement-item">
                        <div class="achievement-marker"></div>
                        <div class="achievement-content">
                            <h4>Secondary School Certificate (SSC)</h4>
                            <p>Gazipur Cantonment Board High School - GPA 5.00</p>
                            <span class="achievement-period">2018</span>
                        </div>
                    </div>
                    <div class="achievement-item">
                        <div class="achievement-marker"></div>
                        <div class="achievement-content">
                            <h4>International Exchange Programs</h4>
                            <p>Selected for prestigious academic programs in Japan & India</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Creation Milestones -->
            <div class="achievement-category">
                <div class="category-header">
                    <div class="category-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Digital Milestones</h3>
                    <div class="category-line"></div>
                </div>
                <div class="achievements-list">
                    <div class="achievement-item featured-achievement">
                        <div class="achievement-marker"></div>
                        <div class="achievement-content">
                            <h4>470,000+ Social Media Followers</h4>
                            <p>Built massive engaged community across platforms</p>
                            <div class="achievement-stats">
                                <span class="stat">470K+ Followers</span>
                                <span class="stat">Millions of Views</span>
                            </div>
                        </div>
                    </div>
                    <div class="achievement-item">
                        <div class="achievement-marker"></div>
                        <div class="achievement-content">
                            <h4>Major Brand Partnerships</h4>
                            <p>Successful collaborations with industry leaders</p>
                        </div>
                    </div>
                    <div class="achievement-item">
                        <div class="achievement-marker"></div>
                        <div class="achievement-content">
                            <h4>Viral Content Creation</h4>
                            <p>Multiple viral videos with social impact</p>
                        </div>
                    </div>
                    <div class="achievement-item">
                        <div class="achievement-marker"></div>
                        <div class="achievement-content">
                            <h4>Community Building Excellence</h4>
                            <p>Outstanding audience engagement and growth</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Professional Development -->
            <div class="achievement-category">
                <div class="category-header">
                    <div class="category-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3>Professional Growth</h3>
                    <div class="category-line"></div>
                </div>
                <div class="achievements-list">
                    <div class="achievement-item">
                        <div class="achievement-marker"></div>
                        <div class="achievement-content">
                            <h4>Leadership Roles</h4>
                            <p>Led multiple university projects successfully</p>
                        </div>
                    </div>
                    <div class="achievement-item">
                        <div class="achievement-marker"></div>
                        <div class="achievement-content">
                            <h4>Cross-cultural Collaboration</h4>
                            <p>International project experience</p>
                        </div>
                    </div>
                    <div class="achievement-item">
                        <div class="achievement-marker"></div>
                        <div class="achievement-content">
                            <h4>Technical Presentations</h4>
                            <p>Workshop presentations and knowledge sharing</p>
                        </div>
                    </div>
                    <div class="achievement-item">
                        <div class="achievement-marker"></div>
                        <div class="achievement-content">
                            <h4>Open Source Contributions</h4>
                            <p>Active contributor to community projects</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Impact -->
            <div class="achievement-category">
                <div class="category-header">
                    <div class="category-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Social Impact</h3>
                    <div class="category-line"></div>
                </div>
                <div class="achievements-list">
                    <div class="achievement-item">
                        <div class="achievement-marker"></div>
                        <div class="achievement-content">
                            <h4>Educational Content Creation</h4>
                            <p>Promoting tech awareness through accessible content</p>
                        </div>
                    </div>
                    <div class="achievement-item">
                        <div class="achievement-marker"></div>
                        <div class="achievement-content">
                            <h4>Social Issues Advocacy</h4>
                            <p>Using platform for meaningful social commentary</p>
                        </div>
                    </div>
                    <div class="achievement-item">
                        <div class="achievement-marker"></div>
                        <div class="achievement-content">
                            <h4>STEM Inspiration</h4>
                            <p>Inspiring youth to pursue technology careers</p>
                        </div>
                    </div>
                    <div class="achievement-item">
                        <div class="achievement-marker"></div>
                        <div class="achievement-content">
                            <h4>Cultural Bridge Building</h4>
                            <p>Connecting diverse audiences through content</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="skills-section">
    <div class="skills-container">
        <h2 class="section-title">Skills & Expertise</h2>
        
        <div class="skills-grid">
            <div class="skill-category">
                <h3><i class="fas fa-brain"></i> AI & Machine Learning</h3>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Python</span>
                        <span>90%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 90%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>TensorFlow</span>
                        <span>85%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 85%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Scikit-learn</span>
                        <span>88%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 88%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Data Analysis</span>
                        <span>92%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 92%;"></div>
                    </div>
                </div>
            </div>
            
            <div class="skill-category">
                <h3><i class="fas fa-code"></i> Web Development</h3>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Laravel</span>
                        <span>95%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 95%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Vue.js</span>
                        <span>88%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 88%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>JavaScript</span>
                        <span>90%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 90%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>MySQL</span>
                        <span>85%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 85%;"></div>
                    </div>
                </div>
            </div>
            
            <div class="skill-category">
                <h3><i class="fas fa-video"></i> Content Creation</h3>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Video Production</span>
                        <span>95%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 95%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Social Media Strategy</span>
                        <span>98%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 98%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Storytelling & Acting</span>
                        <span>93%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 93%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Public Speaking</span>
                        <span>90%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 90%;"></div>
                    </div>
                </div>
            </div>
            
            <div class="skill-category">
                <h3><i class="fas fa-users"></i> Professional Skills</h3>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Team Leadership</span>
                        <span>88%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 88%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Scriptwriting</span>
                        <span>85%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 85%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Video Editing</span>
                        <span>92%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 92%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Educational Content Design</span>
                        <span>90%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 90%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Videos Section -->
<section id="featured-videos" class="featured-videos-section modern-section">
    <div class="videos-container">
        <div class="section-header">
            <h2 class="section-title">News Features</h2>
            <div class="title-underline"></div>
            <p class="section-subtitle">ScienThush in the Media</p>
        </div>
        
        <div class="videos-grid">
            <!-- Video 1 -->
            <div class="video-card">
                <div class="video-thumbnail">
                    <div class="featured-badge">Featured</div>
                    <iframe src="https://www.youtube.com/embed/vplGOweMO-A" 
                            title="ScienThush Featured Content 1" 
                            allowfullscreen>
                    </iframe>
                </div>
                <div class="video-content">
                    
                    <p class="video-description">
  
                    </p>
                    <div class="video-meta">
                        <div class="video-platform">
                            <i class="fab fa-youtube"></i>
                            YouTube
                        </div>
                       
                    </div>
                </div>
            </div>

            <!-- Video 2 -->
            <div class="video-card">
                <div class="video-thumbnail">
                    <div class="featured-badge">Featured</div>
                    <iframe src="https://www.youtube.com/embed/HjDwJ2xhIUs" 
                            title="ScienThush Featured Content 2" 
                            allowfullscreen>
                    </iframe>
                </div>
                <div class="video-content">
                    <div class="video-meta">
                        <div class="video-platform">
                            <i class="fab fa-youtube"></i>
                            YouTube
                        </div>
                       
                    </div>
                </div>
            </div>

            <!-- Video 3 -->
            <div class="video-card">
                <div class="video-thumbnail">
                    <div class="featured-badge">Featured</div>
                    <iframe src="https://www.youtube.com/embed/gJYzQKgmRGE" 
                            title="ScienThush Featured Content 3" 
                            allowfullscreen>
                    </iframe>
                </div>
                <div class="video-content">
                    <div class="video-meta">
                        <div class="video-platform">
                            <i class="fab fa-youtube"></i>
                            YouTube
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ScienThush Content Section -->
@if($info && $info->show_scienthush_section)
<section id="scienthush" class="scienthush-section modern-section">
    <div class="scienthush-container">
        <div class="section-header">
            <h2 class="section-title">ScienThush</h2>
            <div class="title-underline"></div>
            <p class="section-subtitle">{{ $info->scienthush_description ?: 'Most Viewed Content Across Platforms' }}</p>
        </div>

        <!-- Platform Header -->
        <div class="platform-header">
            <div class="platform-logo">
                <i class="fas fa-video" style="color: var(--primary-color);"></i>
            </div>
            <div class="platform-info">
                <h3>Digital Creator & Content Strategist</h3>
                <p>Creating viral content that bridges technology, education, and entertainment</p>
                <div style="margin-top: 15px;">
                    @if($info->scienthush_facebook_url)
                    <a href="{{ $info->scienthush_facebook_url }}" target="_blank" style="color: var(--primary-color); text-decoration: none; margin-right: 20px;">
                        <i class="fab fa-facebook"></i> facebook.com/scienthush
                    </a>
                    @endif
                    @if($info->scienthush_youtube_url)
                    <a href="{{ $info->scienthush_youtube_url }}" target="_blank" style="color: var(--primary-color); text-decoration: none;">
                        <i class="fab fa-youtube"></i> @scienthush
                    </a>
                    @endif
                </div>
            </div>
            <div class="follow-stats">
                <div class="follow-stat">
                    <span class="number">470K+</span>
                    <span class="label">Total Followers</span>
                </div>
                <div class="follow-stat">
                    <span class="number">Millions</span>
                    <span class="label">Total Views</span>
                </div>
                <div class="follow-stat">
                    <span class="number">Viral</span>
                    <span class="label">Content</span>
                </div>
            </div>
        </div>

        <!-- Dynamic Video Content -->
        @if($info->scienthush_featured_videos && count($info->scienthush_featured_videos) > 0)
        <div class="content-grid">
            @foreach($info->scienthush_featured_videos as $index => $video)
            <div class="content-card">
                <div class="content-thumbnail">
                    <div class="viral-badge">Featured</div>
                    @if(strpos($video, 'facebook.com') !== false)
                    <div class="platform-badge facebook-badge">
                        <i class="fab fa-facebook"></i>
                        Facebook
                    </div>
                    @php
                        $embedUrl = '';
                        if (preg_match('/facebook\.com\/.*\/videos\/(\d+)/', $video, $matches)) {
                            $embedUrl = 'https://www.facebook.com/plugins/video.php?height=240&href=' . urlencode($video) . '&show_text=false&width=400&t=0';
                        }
                    @endphp
                    @if($embedUrl)
                    <iframe src="{{ $embedUrl }}" 
                            width="400" height="240" style="border:none;overflow:hidden" scrolling="no" frameborder="0" 
                            allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                    </iframe>
                    @endif
                    @elseif(strpos($video, 'youtube.com') !== false || strpos($video, 'youtu.be') !== false)
                    <div class="platform-badge youtube-badge">
                        <i class="fab fa-youtube"></i>
                        YouTube
                    </div>
                    @php
                        $embedUrl = '';
                        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $video, $matches)) {
                            $embedUrl = 'https://www.youtube.com/embed/' . $matches[1];
                        }
                    @endphp
                    @if($embedUrl)
                    <iframe src="{{ $embedUrl }}" 
                            title="ScienThush Featured Video {{ $index + 1 }}" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                    @endif
                    @endif
                </div>
                <div class="content-info">
                    <h3 class="content-title">ScienThush Featured Content {{ $index + 1 }}</h3>
                    <p class="content-description">
                        Professional content showcasing ScienThush's creative work across digital platforms.
                    </p>
                    <a href="{{ $video }}" target="_blank" class="content-link">
                        @if(strpos($video, 'facebook.com') !== false)
                        <i class="fab fa-facebook"></i>
                        Watch on Facebook
                        @else
                        <i class="fab fa-youtube"></i>
                        Watch on YouTube
                        @endif
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <!-- Fallback: Platform Navigation and Default Content -->
        <div class="platform-tabs">
            <div class="platform-tab active" data-platform="facebook">
                <i class="fab fa-facebook facebook-icon"></i>
                <span>Facebook</span>
            </div>
            <div class="platform-tab" data-platform="youtube">
                <i class="fab fa-youtube youtube-icon"></i>
                <span>YouTube</span>
            </div>

        <!-- Facebook Content -->
        <div id="facebook-content" class="content-grid platform-content active">
            <!-- Default Facebook Videos -->
            <div class="content-card">
                <div class="content-thumbnail">
                    <div class="viral-badge">Viral</div>
                    <div class="platform-badge facebook-badge">
                        <i class="fab fa-facebook"></i>
                        Facebook
                    </div>
                    <iframe src="https://www.facebook.com/plugins/video.php?height=240&href=https%3A%2F%2Fwww.facebook.com%2Fscienthush%2Fvideos%2F1946150585816340&show_text=false&width=400&t=0" 
                            width="400" height="240" style="border:none;overflow:hidden" scrolling="no" frameborder="0" 
                            allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                    </iframe>
                </div>
                <div class="content-info">
                    <h3 class="content-title">Viral ScienThush Content</h3>
                    <p class="content-description">
                        One of the most popular ScienThush videos featuring comedy, social commentary, and 
                        relatable storytelling that resonated with millions of viewers across Bangladesh.
                    </p>
                    <a href="https://www.facebook.com/scienthush/videos/1946150585816340" target="_blank" class="content-link">
                        <i class="fab fa-facebook"></i>
                        Watch on Facebook
                    </a>
                </div>
            </div>

            <!-- Facebook Video 2 -->
            <div class="content-card">
                <div class="content-thumbnail">
                    <div class="trending-badge">Trending</div>
                    <div class="platform-badge facebook-badge">
                        <i class="fab fa-facebook"></i>
                        Facebook
                    </div>
                    <iframe src="https://www.facebook.com/plugins/video.php?height=240&href=https%3A%2F%2Fwww.facebook.com%2Fscienthush%2Fvideos%2F2479949425737080&show_text=false&width=400&t=0" 
                            width="400" height="240" style="border:none;overflow:hidden" scrolling="no" frameborder="0" 
                            allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                    </iframe>
                </div>
                <div class="content-info">
                    <h3 class="content-title">Educational Comedy Series</h3>
                    <p class="content-description">
                        Engaging educational content that makes technology and academic concepts accessible 
                        through humor and storytelling. A perfect blend of entertainment and learning.
                    </p>
                    <a href="https://www.facebook.com/scienthush/videos/2479949425737080" target="_blank" class="content-link">
                        <i class="fab fa-facebook"></i>
                        Watch on Facebook
                    </a>
                </div>
            </div>

            <!-- Facebook Video 3 -->
            <div class="content-card">
                <div class="content-thumbnail">
                    <div class="viral-badge">Viral</div>
                    <div class="platform-badge facebook-badge">
                        <i class="fab fa-facebook"></i>
                        Facebook
                    </div>
                    <iframe src="https://www.facebook.com/plugins/video.php?height=240&href=https%3A%2F%2Fwww.facebook.com%2Fscienthush%2Fvideos%2F2190473314723834&show_text=false&width=400&t=0" 
                            width="400" height="240" style="border:none;overflow:hidden" scrolling="no" frameborder="0" 
                            allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                    </iframe>
                </div>
                <div class="content-info">
                    <h3 class="content-title">Social Commentary & Awareness</h3>
                    <p class="content-description">
                        Hard-hitting social commentary wrapped in entertainment. ScienThush's signature style 
                        of addressing real societal issues through relatable characters and compelling narratives.
                    </p>
                    <a href="https://www.facebook.com/scienthush/videos/2190473314723834" target="_blank" class="content-link">
                        <i class="fab fa-facebook"></i>
                        Watch on Facebook
                    </a>
                        Visit Facebook Page
                    </a>
                </div>
            </div>
        </div>

        <!-- YouTube Content (Initially Hidden) -->
        <div id="youtube-content" class="content-grid platform-content" style="display: none;">
            <!-- YouTube Video 1 -->
            <div class="content-card">
                <div class="content-thumbnail">
                    <div class="trending-badge">Popular</div>
                    <div class="platform-badge youtube-badge">
                        <i class="fab fa-youtube"></i>
                        YouTube
                    </div>
                    <iframe src="https://www.youtube.com/embed/_RupsuOad7A" 
                            title="ScienThush Popular Video" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                </div>
                <div class="content-info">
                    <h3 class="content-title">Comedy & Entertainment</h3>
                    <p class="content-description">
                        One of ScienThush's most popular YouTube videos featuring signature comedy style, 
                        relatable characters, and entertaining content that connects with diverse audiences.
                    </p>
                    <a href="https://youtu.be/_RupsuOad7A" target="_blank" class="content-link">
                        <i class="fab fa-youtube"></i>
                        Watch on YouTube
                    </a>
                </div>
            </div>

            <!-- YouTube Video 2 -->
            <div class="content-card">
                <div class="content-thumbnail">
                    <div class="viral-badge">Viral</div>
                    <div class="platform-badge youtube-badge">
                        <i class="fab fa-youtube"></i>
                        YouTube
                    </div>
                    <iframe src="https://www.youtube.com/embed/0ntFIxxC7ZY" 
                            title="ScienThush Trending Content" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                </div>
                <div class="content-info">
                    <h3 class="content-title">Trending ScienThush Series</h3>
                    <p class="content-description">
                        High-engagement content that showcases ScienThush's ability to create viral material 
                        that resonates across different demographics and social media platforms.
                    </p>
                    <a href="https://youtu.be/0ntFIxxC7ZY" target="_blank" class="content-link">
                        <i class="fab fa-youtube"></i>
                        Watch on YouTube
                    </a>
                </div>
            </div>

            <!-- YouTube Video 3 -->
            <div class="content-card">
                <div class="content-thumbnail">
                    <div class="viral-badge">Viral</div>
                    <div class="platform-badge youtube-badge">
                        <i class="fab fa-youtube"></i>
                        YouTube
                    </div>
                    <iframe src="https://www.youtube.com/embed/aD5BmGQ8mLU" 
                            title="ScienThush Viral Hit" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                </div>
                <div class="content-info">
                    <h3 class="content-title">Viral ScienThush Hit</h3>
                    <p class="content-description">
                        One of the most successful ScienThush videos that went viral across multiple platforms, 
                        demonstrating the power of authentic storytelling and social commentary.
                    </p>
                    <a href="https://youtu.be/aD5BmGQ8mLU" target="_blank" class="content-link">
                        <i class="fab fa-youtube"></i>
                        Watch on YouTube
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endif

<!-- Projects Section -->
<section id="projects" class="projects-section">
    <div class="projects-container">
        <h2 class="section-title">Projects & Research</h2>
        
        <div class="projects-grid">
            <div class="project-card">
                <h3>AI Research Projects</h3>
                <p>
                    Working on explainable AI systems, educational data mining, and precision medicine applications. 
                    Contributing to research that makes machine learning more transparent and actionable. Current focus 
                    includes developing interpretable models for educational assessment and healthcare prediction systems.
                </p>
                <div style="margin: 15px 0; color: var(--accent-color);">
                    <strong>Technologies:</strong> Python, TensorFlow, PyTorch, Scikit-learn, Pandas
                </div>
                <div class="project-links">
                    <a href="#contact">Learn More</a>
                </div>
            </div>
            
            <div class="project-card">
                <h3>ScienThush Content Platform</h3>
                <p>
                    Since 2019, creating engaging social media content with 470K+ followers. Collaborating with major 
                    brands like Nagad, Bkash, Realme, Oppo, and Suzuki on impactful campaigns. Content focuses on 
                    technology awareness, social issues, and educational entertainment reaching millions globally.
                </p>
                <div style="margin: 15px 0; color: var(--accent-color);">
                    <strong>Metrics:</strong> 470K+ Followers, Millions of Views, 95% Engagement Rate
                </div>
                <div class="project-links">
                    <a href="https://facebook.com/scienthush" target="_blank">View Content</a>
                </div>
            </div>
            
            <div class="project-card">
                <h3>Full-Stack Web Applications</h3>
                <p>
                    Full-stack web applications built with modern technologies like Laravel, Vue.js, and React. 
                    Focusing on user experience and scalable architecture. Projects include portfolio management systems, 
                    e-commerce platforms, and educational web applications with AI integration.
                </p>
                <div style="margin: 15px 0; color: var(--accent-color);">
                    <strong>Stack:</strong> Laravel, Vue.js, MySQL, JavaScript, Bootstrap, API Development
                </div>
                <div class="project-links">
                    <a href="#contact">Discuss Project</a>
                </div>
            </div>
            
            <div class="project-card">
                <h3>Educational Data Science</h3>
                <p>
                    Research in educational data mining focusing on student performance prediction, learning analytics, 
                    and personalized education systems. Developing models that help educational institutions improve 
                    learning outcomes through data-driven insights and AI-powered recommendations.
                </p>
                <div style="margin: 15px 0; color: var(--accent-color);">
                    <strong>Focus Areas:</strong> Learning Analytics, Performance Prediction, Recommendation Systems
                </div>
                <div class="project-links">
                    <a href="#contact">Research Details</a>
                </div>
            </div>
            
            <div class="project-card">
                <h3>Brand Collaboration Campaigns</h3>
                <p>
                    Strategic content creation and marketing campaigns for leading brands including financial services, 
                    technology companies, and automotive brands. Campaigns consistently achieve high engagement rates 
                    and measurable business impact through creative storytelling and audience connection.
                </p>
                <div style="margin: 15px 0; color: var(--accent-color);">
                    <strong>Partners:</strong> Nagad, Bkash, Realme, Oppo, Suzuki, and more
                </div>
                <div class="project-links">
                    <a href="#contact">Collaboration Inquiry</a>
                </div>
            </div>
            
            <div class="project-card">
                <h3>Open Source Contributions</h3>
                <p>
                    Active contributor to open source projects in AI/ML and web development domains. Sharing knowledge 
                    through code repositories, technical documentation, and community engagement. Focus on making 
                    advanced technologies accessible to developers and researchers worldwide.
                </p>
                <div style="margin: 15px 0; color: var(--accent-color);">
                    <strong>Areas:</strong> Machine Learning Libraries, Web Frameworks, Educational Tools
                </div>
                <div class="project-links">
                    <a href="#contact">View Repositories</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="about-section" style="background: rgba(0, 0, 0, 0.4);">
    <div class="about-container">
        <h2 class="section-title">What People Say</h2>
        <p style="text-align: center; color: var(--text-muted); margin-bottom: 50px; font-size: 1.1rem;">
            Feedback from colleagues, collaborators, and community members
        </p>
        
        <div class="testimonials-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
            <div class="about-section-card">
                <div style="display: flex; align-items: center; margin-bottom: 20px;">
                    <div style="width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(45deg, var(--primary-color), var(--secondary-color)); display: flex; align-items: center; justify-content: center; color: var(--bg-dark); font-weight: bold; margin-right: 15px;">
                        DU
                    </div>
                    <div>
                        <h4 style="color: var(--text-dark); margin: 0;">University Colleague</h4>
                        <p style="color: var(--text-muted); margin: 0; font-size: 0.9rem;">Computer Science Department</p>
                    </div>
                </div>
                <p style="color: #000000; font-style: italic;">
                    "Atique's approach to combining AI research with practical applications is remarkable. His ability to 
                    explain complex concepts in simple terms makes him an excellent collaborator and mentor."
                </p>
            </div>
            
            <div class="about-section-card">
                <div style="display: flex; align-items: center; margin-bottom: 20px;">
                    <div style="width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(45deg, var(--secondary-color), var(--accent-color)); display: flex; align-items: center; justify-content: center; color: var(--bg-dark); font-weight: bold; margin-right: 15px;">
                        BC
                    </div>
                    <div>
                        <h4 style="color: var(--text-dark); margin: 0;">Brand Collaborator</h4>
                        <p style="color: var(--text-muted); margin: 0; font-size: 0.9rem;">Marketing Professional</p>
                    </div>
                </div>
                <p style="color: #000000; font-style: italic;">
                    "Working with ScienThush has been incredible. His content consistently delivers high engagement rates 
                    and genuine audience connection. He understands both technology and human psychology perfectly."
                </p>
            </div>
            
            <div class="about-section-card">
                <div style="display: flex; align-items: center; margin-bottom: 20px;">
                    <div style="width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(45deg, var(--accent-color), var(--primary-color)); display: flex; align-items: center; justify-content: center; color: var(--bg-dark); font-weight: bold; margin-right: 15px;">
                        CF
                    </div>
                    <div>
                        <h4 style="color: var(--text-dark); margin: 0;">Community Follower</h4>
                        <p style="color: var(--text-muted); margin: 0; font-size: 0.9rem;">Content Enthusiast</p>
                    </div>
                </div>
                <p style="color: #000000; font-style: italic;">
                    "ScienThush's content is not just entertaining but educational. His way of addressing social issues 
                    while maintaining humor and relatability is inspiring. He's genuinely making a positive impact."
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section id="gallery" class="gallery-section">
    <div class="gallery-container">
        <h2 class="section-title">Gallery</h2>
        <p style="text-align: center; color: var(--text-muted); margin-bottom: 50px; font-size: 1.1rem;">
            A glimpse into my journey as both a researcher and content creator
        </p>
        
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="assets/images/atq1.jpg" alt="Atique Enam - Academic" loading="lazy">
                <div class="gallery-overlay">
                    <h4>Academic Journey</h4>
                    <p>Research & Development</p>
                </div>
            </div>
            
            <div class="gallery-item">
                <img src="assets/images/atq2.jpg" alt="Atique Enam - Content Creation" loading="lazy">
                <div class="gallery-overlay">
                    <h4>Content Creation</h4>
                    <p>Behind the Scenes</p>
                </div>
            </div>
            
            <div class="gallery-item">
                <img src="assets/images/atq3.jpg" alt="Atique Enam - Professional" loading="lazy">
                <div class="gallery-overlay">
                    <h4>Professional Work</h4>
                    <p>Brand Collaborations</p>
                </div>
            </div>
            
            <div class="gallery-item">
                <img src="assets/images/img1.jpg" alt="Project Development" loading="lazy">
                <div class="gallery-overlay">
                    <h4>Development</h4>
                    <p>Technical Projects</p>
                </div>
            </div>
            
            <div class="gallery-item">
                <img src="assets/images/img2.jpg" alt="Team Collaboration" loading="lazy">
                <div class="gallery-overlay">
                    <h4>Collaboration</h4>
                    <p>Team Projects</p>
                </div>
            </div>
            
            <div class="gallery-item">
                <img src="assets/images/img3.jpg" alt="Innovation" loading="lazy">
                <div class="gallery-overlay">
                    <h4>Innovation</h4>
                    <p>Creative Solutions</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="contact-container">
        <h2 class="section-title">Let's Connect</h2>
        
        <div class="contact-content">
            <div class="contact-info">
                <h3>Get In Touch</h3>
                <p>For academic collaboration, research partnerships, brand collaborations, content creation opportunities, or speaking engagements</p>
                
                <div class="contact-details">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Professional Email</h4>
                            <p>scienthush.official@gmail.com</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Location</h4>
                            <p>Dhaka, Bangladesh | Available for Remote Collaboration</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-users"></i>
                        <div>
                            <h4>Social Media Reach</h4>
                            <p>470K+ Followers | Millions of Monthly Views</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-graduation-cap"></i>
                        <div>
                            <h4>Academic Status</h4>
                            <p>Final Year CSE Student | AI/ML Research Focus</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-handshake"></i>
                        <div>
                            <h4>Collaboration Areas</h4>
                            <p>Research Projects | Brand Campaigns | Tech Talks | Mentoring</p>
                        </div>
                    </div>
                </div>
                
                <div class="social-links">
                    <a href="https://facebook.com/scienthush" target="_blank" class="social-link">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://bd.linkedin.com/in/atiqueenam" target="_blank" class="social-link">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://www.youtube.com/@scienthush" target="_blank" class="social-link">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="https://www.instagram.com/scienthush" target="_blank" class="social-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://x.com/scienthush" target="_blank" class="social-link">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
            
            <div class="contact-form">
                <h3>Send a Message</h3>
                <form id="contactForm">
                    <div class="form-group">
                        <input type="text" id="name" name="name" required>
                        <label for="name">Your Name</label>
                    </div>
                    
                    <div class="form-group">
                        <input type="email" id="email" name="email" required>
                        <label for="email">Your Email</label>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" id="subject" name="subject" required>
                        <label for="subject">Subject</label>
                    </div>
                    
                    <div class="form-group">
                        <textarea id="message" name="message" rows="5" required></textarea>
                        <label for="message">Your Message</label>
                    </div>
                    
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
        
        <div class="quick-links">
            <a href="https://drive.google.com/file/d/1QsPT1fN8jUIDQ75xaEBJ5Z3xLU_gOmU0/view" target="_blank" class="contact-link">
                <i class="fas fa-file-alt"></i> Download CV
            </a>
            <a href="mailto:scienthush.official@gmail.com" class="contact-link">
                <i class="fas fa-envelope"></i> Direct Email
            </a>
        </div>
    </div>
</section>

<script>
// Particle Generation
function createParticles() {
    const container = document.getElementById('particles');
    const particleCount = 50;
    
    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        
        // Random position
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        
        // Random animation delay and duration
        particle.style.animationDelay = Math.random() * 8 + 's';
        particle.style.animationDuration = (Math.random() * 10 + 5) + 's';
        
        // Random size
        const size = Math.random() * 3 + 1;
        particle.style.width = size + 'px';
        particle.style.height = size + 'px';
        
        // Random color
        const colors = ['#00f5ff', '#ff0080', '#7b68ee', '#00ff41'];
        particle.style.background = colors[Math.floor(Math.random() * colors.length)];
        
        container.appendChild(particle);
    }
}

// Initialize particles when page loads
document.addEventListener('DOMContentLoaded', createParticles);

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Skill bar animation on scroll
const observerOptions = {
    threshold: 0.3,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const skillBars = entry.target.querySelectorAll('.skill-progress');
            skillBars.forEach(bar => {
                bar.style.animation = 'skillLoad 2s ease-in-out forwards';
            });
        }
    });
}, observerOptions);

document.querySelectorAll('.skill-category').forEach(category => {
    observer.observe(category);
});

// Contact form functionality
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const name = formData.get('name');
    const email = formData.get('email');
    const subject = formData.get('subject');
    const message = formData.get('message');
    
    // Create mailto link
    const mailtoLink = `mailto:scienthush.official@gmail.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(`Name: ${name}\nEmail: ${email}\n\nMessage:\n${message}`)}`;
    
    // Open email client
    window.location.href = mailtoLink;
    
    // Show success message
    const submitBtn = this.querySelector('.submit-btn');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-check"></i> Message Sent!';
    submitBtn.style.background = 'linear-gradient(45deg, #28a745, #20c997)';
    
    setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.style.background = 'linear-gradient(45deg, var(--primary-color), var(--secondary-color))';
        this.reset();
    }, 3000);
});

// ScienThush Platform Switching
document.addEventListener('DOMContentLoaded', function() {
    const platformTabs = document.querySelectorAll('.platform-tab');
    const facebookContent = document.getElementById('facebook-content');
    const youtubeContent = document.getElementById('youtube-content');

    platformTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs
            platformTabs.forEach(t => t.classList.remove('active'));
            
            // Add active class to clicked tab
            this.classList.add('active');

            // Get platform data
            const platform = this.getAttribute('data-platform');

            // Hide all content
            facebookContent.style.display = 'none';
            youtubeContent.style.display = 'none';

            // Show selected platform content
            if (platform === 'facebook') {
                facebookContent.style.display = 'grid';
            } else if (platform === 'youtube') {
                youtubeContent.style.display = 'grid';
            }

            // Add smooth animation
            const activeContent = platform === 'facebook' ? facebookContent : youtubeContent;
            activeContent.style.opacity = '0';
            activeContent.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                activeContent.style.opacity = '1';
                activeContent.style.transform = 'translateY(0)';
                activeContent.style.transition = 'all 0.5s ease';
            }, 50);
        });
    });
});
</script>

@endsection
