const { spawn } = require('child_process');
const browserSync = require('browser-sync').create();

const PORT = 8000;
const PROJECT_DIR = __dirname;

// Start PHP server
console.log(`[${new Date().toLocaleTimeString()}] Starting PHP server on port ${PORT}...`);
const phpServer = spawn('php', ['-S', `localhost:${PORT}`], {
  cwd: PROJECT_DIR,
  stdio: 'inherit'
});

// Wait a moment for PHP server to start
setTimeout(() => {
  // Start BrowserSync to watch files and refresh browser
  browserSync.init({
    proxy: `localhost:${PORT}`,
    port: 3000,
    open: true,
    notify: false,
    files: [
      '**/*.php',
      '**/*.html',
      '**/*.css',
      '**/*.js',
      '**/*.png',
      '**/*.jpg',
      '**/*.gif',
      '**/*.svg'
    ],
    ignore: [
      'node_modules/**',
      '_db_backups/**',
      '**/*.log',
      '**/*.tmp',
      '**/.git/**'
    ],
    watchOptions: {
      ignoreInitial: true,
      ignored: ['node_modules/**', '_db_backups/**', '**/*.log', '**/.git/**']
    }
  }, () => {
    console.log(`[${new Date().toLocaleTimeString()}] BrowserSync started!`);
    console.log(`[${new Date().toLocaleTimeString()}] Your site is available at: http://localhost:3000`);
    console.log(`[${new Date().toLocaleTimeString()}] Watching for file changes...`);
  });
}, 1000);

// Cleanup on exit
process.on('SIGINT', () => {
  console.log(`\n[${new Date().toLocaleTimeString()}] Shutting down...`);
  phpServer.kill();
  browserSync.exit();
  process.exit(0);
});

process.on('SIGTERM', () => {
  phpServer.kill();
  browserSync.exit();
  process.exit(0);
});

