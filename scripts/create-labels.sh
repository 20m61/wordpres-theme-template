#!/bin/bash

# Create labels for KawaiiUltra WordPress Theme project
# Usage: ./create-labels.sh [owner/repo]

REPO=${1:-"$(gh repo view --json nameWithOwner -q .nameWithOwner)"}

echo "Creating labels for repository: $REPO"

# Delete default labels (optional)
echo "Cleaning up default labels..."
gh label delete "bug" --repo "$REPO" --yes 2>/dev/null || true
gh label delete "documentation" --repo "$REPO" --yes 2>/dev/null || true
gh label delete "duplicate" --repo "$REPO" --yes 2>/dev/null || true
gh label delete "enhancement" --repo "$REPO" --yes 2>/dev/null || true
gh label delete "good first issue" --repo "$REPO" --yes 2>/dev/null || true
gh label delete "help wanted" --repo "$REPO" --yes 2>/dev/null || true
gh label delete "invalid" --repo "$REPO" --yes 2>/dev/null || true
gh label delete "question" --repo "$REPO" --yes 2>/dev/null || true
gh label delete "wontfix" --repo "$REPO" --yes 2>/dev/null || true

# Create new labels
echo "Creating new labels..."

# Priority labels
gh label create "high-priority" --description "Urgent issue that needs immediate attention" --color "FF0000" --repo "$REPO"
gh label create "medium-priority" --description "Important issue but not urgent" --color "FFA500" --repo "$REPO"
gh label create "low-priority" --description "Nice to have but not critical" --color "FFFF00" --repo "$REPO"

# Type labels
gh label create "enhancement" --description "New feature or request" --color "84B6EB" --repo "$REPO"
gh label create "bug" --description "Something isn't working" --color "D73A4A" --repo "$REPO"
gh label create "refactoring" --description "Code improvement without changing functionality" --color "FEF2C0" --repo "$REPO"
gh label create "documentation" --description "Improvements or additions to documentation" --color "0075CA" --repo "$REPO"
gh label create "testing" --description "Related to testing" --color "7057FF" --repo "$REPO"

# Component labels
gh label create "architecture" --description "Related to system architecture" --color "1D76DB" --repo "$REPO"
gh label create "frontend" --description "Frontend development related" --color "5319E7" --repo "$REPO"
gh label create "performance" --description "Performance improvements" --color "006B75" --repo "$REPO"
gh label create "tooling" --description "Development tools and build process" --color "F9D0C4" --repo "$REPO"
gh label create "ci-cd" --description "Continuous integration and deployment" --color "BFD4F2" --repo "$REPO"
gh label create "docker" --description "Docker and containerization" --color "2496ED" --repo "$REPO"

# Feature labels
gh label create "gutenberg" --description "Gutenberg block editor related" --color "00A0D2" --repo "$REPO"
gh label create "design-system" --description "Design system and UI components" --color "FA57C1" --repo "$REPO"
gh label create "css" --description "CSS and styling" --color "563D7C" --repo "$REPO"
gh label create "javascript" --description "JavaScript related" --color "F1E05A" --repo "$REPO"
gh label create "seo" --description "Search engine optimization" --color "4CAF50" --repo "$REPO"
gh label create "accessibility" --description "Accessibility improvements" --color "008080" --repo "$REPO"
gh label create "security" --description "Security related" --color "EE0701" --repo "$REPO"
gh label create "animation" --description "Animation and transitions" --color "B60205" --repo "$REPO"
gh label create "media" --description "Images, videos, and media handling" --color "FF8C00" --repo "$REPO"

# Quality labels
gh label create "code-quality" --description "Code quality and standards" --color "5319E7" --repo "$REPO"
gh label create "quality-assurance" --description "QA and testing" --color "FBCA04" --repo "$REPO"
gh label create "developer-experience" --description "Developer experience improvements" --color "C2E0C6" --repo "$REPO"
gh label create "compliance" --description "Standards and compliance" --color "0E8A16" --repo "$REPO"
gh label create "wordpress-standards" --description "WordPress coding standards" --color "21538D" --repo "$REPO"

# Other labels
gh label create "core-web-vitals" --description "Core Web Vitals optimization" --color "FF6B6B" --repo "$REPO"
gh label create "gdpr" --description "GDPR compliance" --color "0052CC" --repo "$REPO"
gh label create "content" --description "Content and patterns" --color "D4C5F9" --repo "$REPO"
gh label create "build-tools" --description "Build tools and processes" --color "FEF2C0" --repo "$REPO"
gh label create "onboarding" --description "New developer onboarding" --color "7F8C8D" --repo "$REPO"
gh label create "release" --description "Release preparation" --color "00FF00" --repo "$REPO"
gh label create "devops" --description "DevOps and infrastructure" --color "172B4D" --repo "$REPO"
gh label create "monitoring" --description "Monitoring and analytics" --color "FF9800" --repo "$REPO"
gh label create "compatibility" --description "Browser and device compatibility" --color "9C27B0" --repo "$REPO"

echo "Labels created successfully!"