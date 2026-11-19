const fs = require('fs');
const path = require('path');

const patterns = [
  /MapPin/i,
  /Google Maps/i,
  /<iframe/i,
  /Office/i,
  /Bengaluru/i,
  /Bangalore/i,
  /Location/i,
  /Street/i,
  /Floor/i,
  /Tech Park/i,
  /Pin Code/i,
  /Postal/i,
  /Cyber/i,
  /Indiranagar/i,
  /Koramangala/i,
  /Road/i,
  /Address/i,
  /Visit/i
];

function walk(dir, results = []) {
  if (!fs.existsSync(dir)) return results;
  const list = fs.readdirSync(dir);
  for (const file of list) {
    if (file === 'node_modules' || file === '.git' || file === 'dist' || file === '__pycache__' || file === '.system_generated') continue;
    const full = path.join(dir, file);
    const stat = fs.statSync(full);
    if (stat.isDirectory()) {
      walk(full, results);
    } else if (/\.(jsx?|tsx?|html|json|py)$/i.test(file)) {
      results.push(full);
    }
  }
  return results;
}

const files = [...walk('frontend'), ...walk('backend')];
console.log(`Checking ${files.length} files...`);

for (const file of files) {
  const content = fs.readFileSync(file, 'utf8');
  const lines = content.split('\n');
  lines.forEach((line, idx) => {
    for (const pat of patterns) {
      if (pat.test(line)) {
        console.log(`${file}:${idx + 1}: ${line.trim()}`);
        break;
      }
    }
  });
}
