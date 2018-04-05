FORMAT: 1A

# Not Even Gravatar API

# Avatars [/avatar]

## Show an avatar for a given hash [GET /avatar{?hashed_email}]
Get a JPEG representation of the avatar.

+ Parameters
    + hashed_email: (string, required) - The md5 hash of the email linked to the avatar.

# Informations [/info]

## Show API informations (name,format,version,avatar sizes,image formats) [GET /info]
Get a JSON representation of the informations about the API.