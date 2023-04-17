<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manuscript Evaluation Report</title>
</head>
<body>
    <div>
        <h1>Peer Review Report</h1>
        <table>
            <tbody>
                <tr>
                    <th scope="row"><h2>Manuscript Information</h2></th>
                </tr>
                <tr>
                    <th scope="row">Title:</th>
                    <td>{{ $review->article->title }}</td>
                </tr>
                <tr>
                    <th scope="row"><h2>Evaluation Report</h2></th>
                </tr>
                <tr>
                    <th scope="row">General Comments:</th>
                    <td>{{ $review->comment }}</td>
                </tr>
                <tr>
                    <th scope="row">How to Improve:</th>
                    <td>{{ $review->improve }}</td>
                </tr>
                <tr>
                    <th scope="row">Comments to the Author:</th>
                    <td>{{ $review->comment_author }}</td>
                </tr>
                <tr>
                    <th scope="row">Originality:</th>
                    <td>{{ $review->originality }}</td>
                </tr>
                <tr>
                    <th scope="row">Contribution to the Field:</th>
                    <td>{{ $review->contribution }}</td>
                </tr>
                <tr>
                    <th scope="row">Technical Quality:</th>
                    <td>{{ $review->technical_quality }}</td>
                </tr>
                <tr>
                    <th scope="row">Clarity of Presentation:</th>
                    <td>{{ $review->presentation_clarity }}</td>
                </tr>
                <tr>
                    <th scope="row">Depth of Research:</th>
                    <td>{{ $review->research_depth }}</td>
                </tr>
                <tr>
                    <th scope="row"><h2>Recommendation:</h2></th>
                    <td>{{ $review->result }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>