# GitHub Setup Scripts for KawaiiUltra WordPress Theme

このディレクトリには、KawaiiUltraテーマプロジェクトのGitHubリポジトリをセットアップするためのスクリプトが含まれています。

## 前提条件

- GitHub CLI (`gh`) がインストールされていること
- `gh auth login` で認証済みであること
- GitHubリポジトリが作成済みであること

## スクリプト一覧

### 1. `setup-all.sh` - 一括セットアップ
すべてのラベル、マイルストーン、Issueを一度に作成します。

```bash
# リポジトリ内から実行
./setup-all.sh

# または、リポジトリを指定
./setup-all.sh owner/repo-name
```

### 2. 個別スクリプト

#### `create-labels.sh` - ラベル作成
プロジェクトで使用するすべてのラベルを作成します。
- 優先度ラベル (high/medium/low-priority)
- タイプラベル (enhancement, bug, etc.)
- コンポーネントラベル (architecture, frontend, etc.)
- 品質ラベル (code-quality, accessibility, etc.)

```bash
./create-labels.sh owner/repo-name
```

#### `create-milestones.sh` - マイルストーン作成
5つのフェーズのマイルストーンを作成します。
- Phase 1: Foundation (2週間)
- Phase 2: Frontend Modernization (3週間)
- Phase 3: Performance Optimization (2週間)
- Phase 4: Quality Assurance (2週間)
- Phase 5: Release Preparation (1週間)

```bash
./create-milestones.sh owner/repo-name
```

#### `create-issues.sh` - Issue作成
27個のIssueを作成し、適切なラベルとマイルストーンを割り当てます。
すべてのIssueは `@copilot` にアサインされます。

```bash
./create-issues.sh owner/repo-name
```

## 使用方法

### 新しいリポジトリの完全セットアップ

1. GitHubで新しいリポジトリを作成
   ```
   リポジトリ名: kawaiiultra-wordpress-theme
   ```

2. リポジトリをクローン
   ```bash
   git clone https://github.com/yourusername/kawaiiultra-wordpress-theme.git
   cd kawaiiultra-wordpress-theme
   ```

3. スクリプトファイルをコピー
   ```bash
   cp -r /path/to/scripts .
   ```

4. 一括セットアップを実行
   ```bash
   cd scripts
   ./setup-all.sh
   ```

### 個別実行

特定の要素のみを作成したい場合：

```bash
# ラベルのみ作成
./create-labels.sh yourusername/kawaiiultra-wordpress-theme

# マイルストーンのみ作成
./create-milestones.sh yourusername/kawaiiultra-wordpress-theme

# Issueのみ作成
./create-issues.sh yourusername/kawaiiultra-wordpress-theme
```

## トラブルシューティング

### "Error: Not authenticated with GitHub CLI"
```bash
gh auth login
```

### "Error: No repository specified"
リポジトリ名を明示的に指定してください：
```bash
./setup-all.sh yourusername/repo-name
```

### ラベルやマイルストーンが既に存在する場合
スクリプトはエラーを出力しますが、処理は継続されます。

## 注意事項

- スクリプトは既存のラベルを削除してから新しいラベルを作成します
- 大量のIssueを作成するため、実行前に確認プロンプトが表示されます
- GitHub APIのレート制限に注意してください

## カスタマイズ

必要に応じて、各スクリプト内の以下の項目をカスタマイズできます：
- ラベルの色やカテゴリ
- マイルストーンの期間
- Issueの内容やアサイニー