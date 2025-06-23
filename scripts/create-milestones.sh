#!/bin/bash

# Create milestones for KawaiiUltra WordPress Theme project
# Usage: ./create-milestones.sh [owner/repo]

REPO=${1:-"$(gh repo view --json nameWithOwner -q .nameWithOwner)"}

echo "Creating milestones for repository: $REPO"

# Get current date
CURRENT_DATE=$(date +%Y-%m-%d)

# Calculate due dates (assuming we start today)
PHASE1_DUE=$(date -d "+14 days" +%Y-%m-%d)
PHASE2_DUE=$(date -d "+35 days" +%Y-%m-%d)
PHASE3_DUE=$(date -d "+49 days" +%Y-%m-%d)
PHASE4_DUE=$(date -d "+63 days" +%Y-%m-%d)
PHASE5_DUE=$(date -d "+70 days" +%Y-%m-%d)

# Create milestones
echo "Creating Phase 1: Foundation milestone..."
gh api repos/$REPO/milestones \
  -X POST \
  -f title="Phase 1: Foundation" \
  -f description="Basic architecture setup, development environment, and build tools configuration. This phase establishes the technical foundation for the entire project." \
  -f due_on="${PHASE1_DUE}T23:59:59Z" \
  -f state="open"

echo "Creating Phase 2: Frontend Modernization milestone..."
gh api repos/$REPO/milestones \
  -X POST \
  -f title="Phase 2: Frontend Modernization" \
  -f description="Gutenberg block editor support, design system implementation, and modern CSS/JS architecture. Transform the theme to use modern WordPress features." \
  -f due_on="${PHASE2_DUE}T23:59:59Z" \
  -f state="open"

echo "Creating Phase 3: Performance Optimization milestone..."
gh api repos/$REPO/milestones \
  -X POST \
  -f title="Phase 3: Performance Optimization" \
  -f description="Asset optimization, Core Web Vitals improvements, and image/font optimization. Focus on making the theme fast and efficient." \
  -f due_on="${PHASE3_DUE}T23:59:59Z" \
  -f state="open"

echo "Creating Phase 4: Quality Assurance milestone..."
gh api repos/$REPO/milestones \
  -X POST \
  -f title="Phase 4: Quality Assurance" \
  -f description="Testing framework implementation, accessibility compliance, and security hardening. Ensure the theme meets all quality standards." \
  -f due_on="${PHASE4_DUE}T23:59:59Z" \
  -f state="open"

echo "Creating Phase 5: Release Preparation milestone..."
gh api repos/$REPO/milestones \
  -X POST \
  -f title="Phase 5: Release Preparation" \
  -f description="Final documentation, WordPress.org compliance check, and release preparation. Get the theme ready for public release." \
  -f due_on="${PHASE5_DUE}T23:59:59Z" \
  -f state="open"

echo "Milestones created successfully!"
echo ""
echo "Phase timeline:"
echo "- Phase 1: Foundation - Due: $PHASE1_DUE"
echo "- Phase 2: Frontend Modernization - Due: $PHASE2_DUE"
echo "- Phase 3: Performance Optimization - Due: $PHASE3_DUE"
echo "- Phase 4: Quality Assurance - Due: $PHASE4_DUE"
echo "- Phase 5: Release Preparation - Due: $PHASE5_DUE"