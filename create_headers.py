#!/usr/bin/env python3
"""
Script to create header images for Legal and Terms pages
Matches the style of the existing Privacy header
"""

try:
    from PIL import Image, ImageDraw, ImageFont
    import os
    
    # Get the directory where headers are stored
    headers_dir = "/Users/ralph/Documents/Development/wyw/global/media/img/headers"
    privacy_header = os.path.join(headers_dir, "header_privacy.png")
    
    # Check if privacy header exists to use as reference
    if os.path.exists(privacy_header):
        # Open the privacy header to get dimensions and style
        img = Image.open(privacy_header)
        width, height = img.size
        
        # Create new images with same dimensions
        # Try to match the color scheme - dark text on light background or vice versa
        # Based on the site's color scheme (#2D1B0E dark brown, #e9dabe cream)
        
        def create_header(text, filename):
            # Create image with transparent or light background
            new_img = Image.new('RGBA', (width, height), (255, 255, 255, 0))
            draw = ImageDraw.Draw(new_img)
            
            # Try to use a similar font style - bigger and bolder
            # Use default font, size adjusted for 150x18 image
            font = None
            font_size = 17  # Increased size for better visibility
            
            # Try to find a bold serif font - check common macOS font locations
            font_paths = [
                "/System/Library/Fonts/Supplemental/Times New Roman Bold.ttf",
                "/Library/Fonts/Times New Roman Bold.ttf",
                "/System/Library/Fonts/Supplemental/Verdana Bold.ttf",
                "/System/Library/Fonts/Supplemental/Arial Bold.ttf",
                "/System/Library/Fonts/Supplemental/Times New Roman.ttf",
                "/Library/Fonts/Times New Roman.ttf",
            ]
            
            for font_path in font_paths:
                try:
                    if os.path.exists(font_path):
                        font = ImageFont.truetype(font_path, font_size)
                        break
                except:
                    continue
            
            if font is None:
                # Fallback: try to load system fonts with bold variant
                try:
                    # Try Helvetica Bold
                    font = ImageFont.truetype("/System/Library/Fonts/Helvetica.ttc", font_size, index=1)
                except:
                    try:
                        # Try Arial Bold
                        font = ImageFont.truetype("/System/Library/Fonts/Supplemental/Arial.ttf", font_size)
                    except:
                        # Last resort: default font
                        font = ImageFont.load_default()
            
            # Get text dimensions
            bbox = draw.textbbox((0, 0), text, font=font)
            text_width = bbox[2] - bbox[0]
            text_height = bbox[3] - bbox[1]
            
            # Center the text
            x = (width - text_width) // 2
            y = (height - text_height) // 2 - 2  # Slight adjustment for centering
            
            # Draw text with crisp bold effect - use integer pixels only to avoid blur
            # Use dark brown color to match site (#2D1B0E = rgb(45, 27, 14))
            text_color = (45, 27, 14, 255)
            
            # Draw text with minimal integer offsets for crisp bold effect (no blur)
            # Only horizontal and vertical 1-pixel offsets for clean boldness
            for dx, dy in [(0, 0), (1, 0), (-1, 0), (0, 1), (0, -1)]:
                draw.text((int(x + dx), int(y + dy)), text, fill=text_color, font=font)
            
            # Save the image
            output_path = os.path.join(headers_dir, filename)
            new_img.save(output_path, 'PNG')
            print(f"Created {filename}")
        
        # Create Legal header
        create_header("Legal", "header_legal.png")
        
        # Create Terms header
        create_header("Terms", "header_terms.png")
        
        print("Header images created successfully!")
    else:
        print(f"Error: Could not find {privacy_header}")
        print("Please ensure the privacy header exists as a reference.")
        
except ImportError:
    print("PIL (Pillow) is not installed.")
    print("To install it, run: pip3 install Pillow")
    print("\nAlternatively, you can manually create the images:")
    print("- Size: 150x18 pixels")
    print("- Text: 'Legal' and 'Terms'")
    print("- Style: Match header_privacy.png")
    print("- Save as: header_legal.png and header_terms.png")
    print("- Location: global/media/img/headers/")
except Exception as e:
    print(f"Error creating headers: {e}")

