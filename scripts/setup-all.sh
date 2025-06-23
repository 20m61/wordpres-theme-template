#!/bin/bash

# Complete setup script for KawaiiUltra WordPress Theme GitHub repository
# This script creates labels, milestones, and all issues
# Usage: ./setup-all.sh [owner/repo]

REPO=${1:-"$(gh repo view --json nameWithOwner -q .nameWithOwner 2>/dev/null)"}

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

echo -e "${BLUE}================================================${NC}"
echo -e "${BLUE}KawaiiUltra WordPress Theme - GitHub Setup${NC}"
echo -e "${BLUE}================================================${NC}"

# Check if gh is installed
if ! command -v gh &> /dev/null; then
    echo -e "${RED}Error: GitHub CLI (gh) is not installed.${NC}"
    echo "Please install it from: https://cli.github.com/"
    exit 1
fi

# Check if authenticated
if ! gh auth status &> /dev/null; then
    echo -e "${RED}Error: Not authenticated with GitHub CLI.${NC}"
    echo "Please run: gh auth login"
    exit 1
fi

# If no repo specified, check if we're in a git repo
if [ -z "$REPO" ]; then
    echo -e "${RED}Error: No repository specified and not in a GitHub repository.${NC}"
    echo "Usage: ./setup-all.sh owner/repo"
    echo "Or run from within a GitHub repository directory"
    exit 1
fi

echo -e "${GREEN}Repository: $REPO${NC}"
echo ""

# Ask for confirmation
read -p "This will create labels, milestones, and 27 issues. Continue? (y/N) " -n 1 -r
echo
if [[ ! $REPLY =~ ^[Yy]$ ]]; then
    echo "Setup cancelled."
    exit 0
fi

# Change to scripts directory
SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd "$SCRIPT_DIR"

# Step 1: Create labels
echo -e "\n${YELLOW}Step 1: Creating labels...${NC}"
if [ -f "./create-labels.sh" ]; then
    ./create-labels.sh "$REPO"
    if [ $? -eq 0 ]; then
        echo -e "${GREEN}✓ Labels created successfully${NC}"
    else
        echo -e "${RED}✗ Failed to create labels${NC}"
        exit 1
    fi
else
    echo -e "${RED}✗ create-labels.sh not found${NC}"
    exit 1
fi

# Step 2: Create milestones
echo -e "\n${YELLOW}Step 2: Creating milestones...${NC}"
if [ -f "./create-milestones.sh" ]; then
    ./create-milestones.sh "$REPO"
    if [ $? -eq 0 ]; then
        echo -e "${GREEN}✓ Milestones created successfully${NC}"
    else
        echo -e "${RED}✗ Failed to create milestones${NC}"
        exit 1
    fi
else
    echo -e "${RED}✗ create-milestones.sh not found${NC}"
    exit 1
fi

# Step 3: Create issues
echo -e "\n${YELLOW}Step 3: Creating issues...${NC}"
if [ -f "./create-issues.sh" ]; then
    ./create-issues.sh "$REPO"
    if [ $? -eq 0 ]; then
        echo -e "${GREEN}✓ Issues created successfully${NC}"
    else
        echo -e "${RED}✗ Failed to create issues${NC}"
        exit 1
    fi
else
    echo -e "${RED}✗ create-issues.sh not found${NC}"
    exit 1
fi

# Summary
echo -e "\n${BLUE}================================================${NC}"
echo -e "${GREEN}✅ Setup completed successfully!${NC}"
echo -e "${BLUE}================================================${NC}"
echo ""
echo "Repository: $REPO"
echo "Created:"
echo "  - Labels for categorizing issues"
echo "  - 5 milestones for project phases"
echo "  - 27 issues covering all aspects of theme modernization"
echo ""
echo -e "${YELLOW}Next steps:${NC}"
echo "1. Visit: https://github.com/$REPO/issues"
echo "2. Review and prioritize the created issues"
echo "3. Create a project board for tracking progress"
echo "4. Start with Phase 1 foundation issues"
echo ""
echo -e "${BLUE}GitHub Copilot Integration:${NC}"
echo "All issues are assigned to @copilot for AI-assisted development."
echo ""
echo -e "${GREEN}Happy coding! 🚀${NC}"